#!/usr/bin/env bash
#
# Sherpalaya production deploy script.
#
# Pull the latest main, install dependencies, run migrations, clear caches,
# and run the idempotent content seeders.
#
# Usage:
#     ssh user@server
#     cd /path/to/sherpalaya
#     ./scripts/deploy.sh
#
# Safe to re-run. Fails fast on any error.

set -euo pipefail

# ─── locate ourselves ────────────────────────────────────────────────────
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" && pwd)"
PROJECT_DIR="$(cd "$SCRIPT_DIR/.." && pwd)"
cd "$PROJECT_DIR"

# ─── sanity ──────────────────────────────────────────────────────────────
echo "▶ Deploying in: $PROJECT_DIR"

if [ ! -f artisan ]; then
    echo "✗ artisan not found — wrong directory?" >&2
    exit 1
fi

if [ ! -f .env ]; then
    echo "✗ .env not found — refusing to run on an unconfigured host" >&2
    exit 1
fi

# ─── place the site in maintenance mode (skipped if already down) ────────
if ! php artisan down --render="errors::503" --secret="$(openssl rand -hex 16)" 2>/dev/null; then
    echo "⚠ already in maintenance mode (continuing)"
fi
trap 'php artisan up || true' EXIT  # always bring it back up

# ─── pull latest code ────────────────────────────────────────────────────
echo "▶ git pull"
git fetch --all --tags
git reset --hard origin/main          # discard any local edits made directly on the server

# ─── PHP dependencies (production mode, no dev packages) ─────────────────
echo "▶ composer install --no-dev --optimize-autoloader"
composer install --no-dev --optimize-autoloader --no-interaction

# ─── front-end build (only if a manifest is committed) ───────────────────
# Sherpalaya ships a pre-built public/build/manifest.json, so skip npm here.
# If you switch to building on the server, uncomment:
#   npm ci --omit=dev
#   npm run build

# ─── DB migrations ───────────────────────────────────────────────────────
echo "▶ artisan migrate --force"
php artisan migrate --force

# ─── caches: clear-then-rebuild ──────────────────────────────────────────
echo "▶ refreshing caches"
php artisan view:clear
php artisan config:clear
php artisan route:clear
php artisan event:clear || true
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan event:cache || true

# ─── storage symlink (no-op if already linked) ───────────────────────────
php artisan storage:link 2>/dev/null || true

# ─── content seeders (all idempotent — safe to re-run) ───────────────────
echo "▶ seeding regional media + Dolpo→Rara + Everest tier content"
php artisan db:seed --force --class='Database\Seeders\RegionalMediaSeeder'
php artisan db:seed --force --class='Database\Seeders\DolpoToRaraTrekContentSeeder'
php artisan db:seed --force --class='Database\Seeders\EverestTiersFullContentSeeder'

# ─── permissions (in case freshly created files need them) ───────────────
chmod -R ug+rwX storage bootstrap/cache 2>/dev/null || true

# ─── opcache reset (only matters with php-fpm; harmless otherwise) ───────
if command -v cachetool >/dev/null 2>&1; then
    cachetool opcache:reset --fcgi=127.0.0.1:9000 2>/dev/null || true
fi

# ─── done — trap will restore the site ───────────────────────────────────
echo "✓ Deploy finished. Maintenance mode will be lifted on script exit."
