<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sherpalaya — Design Preview</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #FAF8F4;
            --surface: #FFFFFF;
            --text: #1C1C1A;
            --text-muted: #5C5A55;
            --brand: #1F3D2E;
            --brand-hover: #163024;
            --accent: #C9684A;
            --accent-hover: #B0573E;
            --border: #E8E3DA;
            --hero-overlay: rgba(28, 28, 26, 0.45);
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            font-size: 17px;
            line-height: 1.6;
            color: var(--text);
            background: var(--bg);
            -webkit-font-smoothing: antialiased;
        }

        .display { font-family: 'Fraunces', Georgia, serif; font-weight: 500; letter-spacing: -0.02em; }

        /* ==== Sticky preview nav ==== */
        .preview-nav {
            position: sticky; top: 0; z-index: 100;
            background: rgba(250, 248, 244, 0.85); backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--border);
            padding: 16px 32px;
        }
        .preview-nav__inner { max-width: 1280px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; gap: 32px; }
        .preview-nav__brand { font-family: 'Fraunces', serif; font-weight: 600; font-size: 22px; color: var(--brand); letter-spacing: -0.01em; }
        .preview-nav__links { display: flex; gap: 32px; font-size: 14px; font-weight: 500; }
        .preview-nav__links a { color: var(--text); text-decoration: none; }
        .preview-nav__links a:hover { color: var(--accent); }
        .preview-nav__cta {
            background: var(--brand); color: #fff; padding: 10px 22px;
            border-radius: 9999px; font-size: 14px; font-weight: 500;
            text-decoration: none; transition: background 0.2s;
        }
        .preview-nav__cta:hover { background: var(--brand-hover); }

        section { padding: 80px 32px; max-width: 1280px; margin: 0 auto; }
        section + section { border-top: 1px solid var(--border); }
        .label { font-family: 'Inter', sans-serif; text-transform: uppercase; letter-spacing: 0.12em; font-size: 12px; font-weight: 600; color: var(--accent); margin-bottom: 16px; }
        h2.section-title { font-family: 'Fraunces', serif; font-weight: 500; font-size: 40px; line-height: 1.1; margin-bottom: 12px; letter-spacing: -0.02em; }
        p.section-desc { color: var(--text-muted); margin-bottom: 40px; max-width: 640px; }

        /* ==== Hero mockup ==== */
        .hero {
            position: relative;
            height: 88vh; min-height: 600px;
            background: url('https://sherpalaya.com/storage/media/85fc8711-e95d-4200-8010-c7b9c806ab01.jpg') center/cover no-repeat;
            display: flex; align-items: center;
            color: #fff;
        }
        .hero::after {
            content: '';
            position: absolute; inset: 0;
            background: linear-gradient(to bottom, rgba(28,28,26,0.1) 0%, rgba(28,28,26,0) 30%, rgba(28,28,26,0.6) 100%);
        }
        .hero__inner { max-width: 1280px; margin: 0 auto; padding: 0 32px; position: relative; z-index: 1; width: 100%; }
        .hero__eyebrow { font-size: 13px; letter-spacing: 0.18em; text-transform: uppercase; font-weight: 600; opacity: 0.9; margin-bottom: 16px; }
        .hero__headline { font-family: 'Fraunces', serif; font-weight: 500; font-size: clamp(40px, 6vw, 76px); line-height: 1.05; letter-spacing: -0.02em; max-width: 18ch; margin-bottom: 24px; }
        .hero__sub { font-size: 19px; max-width: 50ch; opacity: 0.92; margin-bottom: 40px; line-height: 1.55; }
        .hero__actions { display: flex; gap: 12px; flex-wrap: wrap; }

        /* ==== Buttons ==== */
        .btn { display: inline-flex; align-items: center; gap: 8px; padding: 14px 28px; border-radius: 9999px; font-weight: 500; font-size: 15px; text-decoration: none; cursor: pointer; border: none; transition: all 0.2s; font-family: inherit; }
        .btn--primary { background: var(--accent); color: #fff; }
        .btn--primary:hover { background: var(--accent-hover); }
        .btn--ghost-light { background: rgba(255,255,255,0.12); color: #fff; backdrop-filter: blur(8px); border: 1px solid rgba(255,255,255,0.4); }
        .btn--ghost-light:hover { background: rgba(255,255,255,0.22); }
        .btn--secondary { background: var(--brand); color: #fff; }
        .btn--secondary:hover { background: var(--brand-hover); }
        .btn--ghost { background: transparent; color: var(--text); border: 1px solid var(--border); }
        .btn--ghost:hover { border-color: var(--text); }

        /* ==== Palette swatches ==== */
        .palette { display: grid; grid-template-columns: repeat(auto-fill, minmax(180px, 1fr)); gap: 16px; }
        .swatch { background: var(--surface); border: 1px solid var(--border); border-radius: 16px; padding: 16px; }
        .swatch__color { height: 80px; border-radius: 10px; margin-bottom: 12px; box-shadow: inset 0 0 0 1px var(--border); }
        .swatch__name { font-size: 13px; font-weight: 600; }
        .swatch__hex { font-family: 'Inter', monospace; font-size: 12px; color: var(--text-muted); margin-top: 2px; }
        .swatch__role { font-size: 11px; color: var(--text-muted); margin-top: 6px; text-transform: uppercase; letter-spacing: 0.1em; }

        /* ==== Typography sample ==== */
        .typo-row { display: grid; grid-template-columns: 140px 1fr; gap: 32px; padding: 20px 0; border-bottom: 1px solid var(--border); align-items: baseline; }
        .typo-row:last-child { border-bottom: none; }
        .typo-meta { font-size: 12px; color: var(--text-muted); text-transform: uppercase; letter-spacing: 0.1em; }
        .typo-sample.h1 { font-family: 'Fraunces', serif; font-weight: 500; font-size: 72px; line-height: 1.05; letter-spacing: -0.02em; }
        .typo-sample.h2 { font-family: 'Fraunces', serif; font-weight: 500; font-size: 48px; line-height: 1.1; letter-spacing: -0.02em; }
        .typo-sample.h3 { font-family: 'Fraunces', serif; font-weight: 500; font-size: 28px; line-height: 1.2; }
        .typo-sample.body { font-family: 'Inter', sans-serif; font-size: 17px; line-height: 1.6; max-width: 60ch; }
        .typo-sample.meta { font-family: 'Inter', sans-serif; font-size: 12px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 600; color: var(--accent); }

        /* ==== Trek cards ==== */
        .cards { display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 24px; }
        .card { background: var(--surface); border-radius: 18px; overflow: hidden; box-shadow: 0 1px 2px rgba(0,0,0,0.04); transition: transform 0.3s, box-shadow 0.3s; }
        .card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(0,0,0,0.08); }
        .card__media { aspect-ratio: 4/3; overflow: hidden; position: relative; }
        .card__media img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s; }
        .card:hover .card__media img { transform: scale(1.05); }
        .card__badge { position: absolute; top: 14px; left: 14px; background: rgba(28,28,26,0.7); color: #fff; padding: 6px 12px; border-radius: 9999px; font-size: 11px; font-weight: 500; text-transform: uppercase; letter-spacing: 0.08em; backdrop-filter: blur(6px); }
        .card__body { padding: 24px; }
        .card__region { font-size: 12px; text-transform: uppercase; letter-spacing: 0.12em; font-weight: 600; color: var(--accent); margin-bottom: 8px; }
        .card__title { font-family: 'Fraunces', serif; font-weight: 500; font-size: 22px; line-height: 1.2; margin-bottom: 16px; letter-spacing: -0.01em; }
        .card__meta { display: flex; gap: 16px; font-size: 13px; color: var(--text-muted); margin-bottom: 20px; }
        .card__meta-item { display: flex; align-items: center; gap: 6px; }
        .card__price { font-family: 'Fraunces', serif; font-size: 20px; font-weight: 500; color: var(--text); display: flex; align-items: baseline; gap: 6px; }
        .card__price-prefix { font-size: 12px; color: var(--text-muted); font-family: 'Inter', sans-serif; text-transform: uppercase; letter-spacing: 0.1em; font-weight: 600; }

        /* ==== Anchor row ==== */
        .anchors { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; }
        @media (max-width: 900px) { .anchors { grid-template-columns: repeat(2, 1fr); } }

        /* ==== Comparison split ==== */
        .compare { display: grid; grid-template-columns: 1fr 1fr; gap: 24px; }
        @media (max-width: 800px) { .compare { grid-template-columns: 1fr; } }
        .compare__panel { padding: 24px; border-radius: 16px; }
        .compare__panel--before { background: #1A2845; color: #fff; font-family: 'Courier New', monospace; }
        .compare__panel--after { background: var(--surface); border: 1px solid var(--border); }
        .compare__panel h3 { font-size: 11px; text-transform: uppercase; letter-spacing: 0.18em; margin-bottom: 16px; opacity: 0.7; font-weight: 600; font-family: 'Inter', sans-serif; }
        .compare__panel--after h3 { color: var(--accent); }
        .compare-headline-before { font-family: 'Courier New', monospace; font-size: 32px; font-weight: bold; color: #FFC700; text-transform: uppercase; line-height: 1.1; margin-bottom: 16px; }
        .compare-sub-before { font-family: 'Courier New', monospace; font-size: 18px; color: #fff; text-transform: uppercase; opacity: 0.9; }
        .compare-headline-after { font-family: 'Fraunces', serif; font-size: 36px; font-weight: 500; line-height: 1.1; letter-spacing: -0.02em; margin-bottom: 12px; }
        .compare-sub-after { font-size: 15px; color: var(--text-muted); }

        /* ==== Footer note ==== */
        .end-note { padding: 60px 32px; text-align: center; color: var(--text-muted); font-size: 14px; }
    </style>
</head>
<body>

    {{-- Sticky preview nav --}}
    <nav class="preview-nav">
        <div class="preview-nav__inner">
            <div class="preview-nav__brand">Sherpalaya</div>
            <div class="preview-nav__links">
                <a href="#hero">Trips</a>
                <a href="#cards">Regions</a>
                <a href="#typography">About</a>
                <a href="#palette">Reviews</a>
            </div>
            <a href="#" class="preview-nav__cta">Plan Your Trip</a>
        </div>
    </nav>

    {{-- HERO MOCKUP --}}
    <header id="hero" class="hero">
        <div class="hero__inner">
            <p class="hero__eyebrow">Sherpa-led since 1995</p>
            <h1 class="hero__headline">Walk the Himalayas with the people who call it home.</h1>
            <p class="hero__sub">Authentic, fully-supported treks and expeditions led by four generations of Solukhumbu Sherpa guides. From Everest Base Camp to the hidden valleys of Mustang.</p>
            <div class="hero__actions">
                <a href="#" class="btn btn--primary">Plan Your Trip →</a>
                <a href="#" class="btn btn--ghost-light">Browse Treks</a>
            </div>
        </div>
    </header>

    {{-- TYPOGRAPHY --}}
    <section id="typography">
        <p class="label">Typography</p>
        <h2 class="section-title">Fraunces + Inter</h2>
        <p class="section-desc">Editorial warmth for headlines, modern clarity for body. Used across the site.</p>

        <div class="typo-row">
            <div class="typo-meta">H1 · Fraunces 72/500</div>
            <div class="typo-sample h1">Real Stories,<br>Real Adventures.</div>
        </div>
        <div class="typo-row">
            <div class="typo-meta">H2 · Fraunces 48/500</div>
            <div class="typo-sample h2">Featured expeditions this season</div>
        </div>
        <div class="typo-row">
            <div class="typo-meta">H3 · Fraunces 28/500</div>
            <div class="typo-sample h3">Everest Base Camp Trek</div>
        </div>
        <div class="typo-row">
            <div class="typo-meta">Body · Inter 17/400</div>
            <div class="typo-sample body">Followed by Real Sherpa's village, everybody wants to see a glimpse of the world's highest mountain. Sherpalaya has organized fully-supported EBC treks for over 30 years, with a 98% summit success rate.</div>
        </div>
        <div class="typo-row">
            <div class="typo-meta">Meta · Inter 12/600</div>
            <div class="typo-sample meta">Khumbu Region · 14 days · Moderate</div>
        </div>
    </section>

    {{-- PALETTE --}}
    <section id="palette">
        <p class="label">Palette</p>
        <h2 class="section-title">Stone & Forest</h2>
        <p class="section-desc">Warm off-white background lets mountain photography do the heavy lifting. Deep forest green for brand authority. Terracotta accent for CTAs and badges.</p>

        <div class="palette">
            <div class="swatch"><div class="swatch__color" style="background:#FAF8F4"></div><div class="swatch__name">Background</div><div class="swatch__hex">#FAF8F4</div><div class="swatch__role">Page</div></div>
            <div class="swatch"><div class="swatch__color" style="background:#FFFFFF"></div><div class="swatch__name">Surface</div><div class="swatch__hex">#FFFFFF</div><div class="swatch__role">Cards</div></div>
            <div class="swatch"><div class="swatch__color" style="background:#1C1C1A"></div><div class="swatch__name">Text Primary</div><div class="swatch__hex">#1C1C1A</div><div class="swatch__role">Body</div></div>
            <div class="swatch"><div class="swatch__color" style="background:#5C5A55"></div><div class="swatch__name">Text Muted</div><div class="swatch__hex">#5C5A55</div><div class="swatch__role">Meta</div></div>
            <div class="swatch"><div class="swatch__color" style="background:#1F3D2E"></div><div class="swatch__name">Brand · Forest</div><div class="swatch__hex">#1F3D2E</div><div class="swatch__role">Buttons, nav</div></div>
            <div class="swatch"><div class="swatch__color" style="background:#C9684A"></div><div class="swatch__name">Accent · Terracotta</div><div class="swatch__hex">#C9684A</div><div class="swatch__role">CTAs, eyebrows</div></div>
            <div class="swatch"><div class="swatch__color" style="background:#E8E3DA"></div><div class="swatch__name">Border</div><div class="swatch__hex">#E8E3DA</div><div class="swatch__role">Hairlines</div></div>
        </div>
    </section>

    {{-- BUTTONS --}}
    <section id="buttons">
        <p class="label">Buttons</p>
        <h2 class="section-title">Just two styles. Primary, ghost.</h2>
        <p class="section-desc">Pill-shaped. Generous padding. No excess decoration.</p>

        <div style="display: flex; gap: 16px; flex-wrap: wrap; align-items: center;">
            <a href="#" class="btn btn--primary">Plan Your Trip</a>
            <a href="#" class="btn btn--secondary">Talk to a Sherpa</a>
            <a href="#" class="btn btn--ghost">Browse Treks</a>
        </div>
    </section>

    {{-- ANCHOR TREK ROW --}}
    <section id="cards">
        <p class="label">Featured Trips</p>
        <h2 class="section-title">Your four anchor treks, one clean row</h2>
        <p class="section-desc">No more three identical carousels. One curated row, prices visible, region + duration at a glance.</p>

        <div class="anchors">
            <article class="card">
                <div class="card__media">
                    <img src="https://sherpalaya.com/storage/media/85fc8711-e95d-4200-8010-c7b9c806ab01.jpg" alt="Everest Base Camp">
                    <span class="card__badge">Bestseller</span>
                </div>
                <div class="card__body">
                    <p class="card__region">Khumbu</p>
                    <h3 class="card__title">Everest Base Camp Trek</h3>
                    <div class="card__meta">
                        <span class="card__meta-item">14 days</span>
                        <span class="card__meta-item">5,545 m</span>
                        <span class="card__meta-item">Moderate</span>
                    </div>
                    <div class="card__price"><span class="card__price-prefix">From</span>$1,650</div>
                </div>
            </article>

            <article class="card">
                <div class="card__media">
                    <img src="https://sherpalaya.com/storage/media/c2d5158d-27d3-4bce-ad6d-5307b3c9fa7b.jpg" alt="Manaslu Circuit">
                </div>
                <div class="card__body">
                    <p class="card__region">Gorkha</p>
                    <h3 class="card__title">Manaslu Circuit Trek</h3>
                    <div class="card__meta">
                        <span class="card__meta-item">16 days</span>
                        <span class="card__meta-item">5,160 m</span>
                        <span class="card__meta-item">Challenging</span>
                    </div>
                    <div class="card__price"><span class="card__price-prefix">From</span>$1,850</div>
                </div>
            </article>

            <article class="card">
                <div class="card__media">
                    <img src="https://images.unsplash.com/photo-1551632811-561732d1e306?w=800&q=80" alt="Upper Mustang">
                </div>
                <div class="card__body">
                    <p class="card__region">Mustang</p>
                    <h3 class="card__title">Upper Mustang Trek</h3>
                    <div class="card__meta">
                        <span class="card__meta-item">12 days</span>
                        <span class="card__meta-item">3,840 m</span>
                        <span class="card__meta-item">Moderate</span>
                    </div>
                    <div class="card__price"><span class="card__price-prefix">From</span>$2,200</div>
                </div>
            </article>

            <article class="card">
                <div class="card__media">
                    <img src="https://images.unsplash.com/photo-1486870591958-9b9d0d1dda99?w=800&q=80" alt="Langtang">
                </div>
                <div class="card__body">
                    <p class="card__region">Langtang</p>
                    <h3 class="card__title">Langtang Valley Trek</h3>
                    <div class="card__meta">
                        <span class="card__meta-item">10 days</span>
                        <span class="card__meta-item">3,870 m</span>
                        <span class="card__meta-item">Moderate</span>
                    </div>
                    <div class="card__price"><span class="card__price-prefix">From</span>$1,100</div>
                </div>
            </article>
        </div>
    </section>

    {{-- BEFORE / AFTER --}}
    <section id="compare">
        <p class="label">Headline Treatment — Before vs After</p>
        <h2 class="section-title">Same content. Different feeling.</h2>

        <div class="compare">
            <div class="compare__panel compare__panel--before">
                <h3>Current</h3>
                <div class="compare-headline-before">MT. AMA DABLAM<br>EXPEDITION</div>
                <div class="compare-sub-before">6812 M</div>
                <button style="margin-top: 16px; background: #000080; color: white; border: none; padding: 10px 20px; border-radius: 9999px; font-family: 'Courier New', monospace; font-size: 12px;">» EXPLORE</button>
            </div>

            <div class="compare__panel compare__panel--after">
                <h3>Proposed</h3>
                <p class="card__region" style="margin-bottom: 8px;">Khumbu · 6,812 m</p>
                <div class="compare-headline-after">Mt. Ama Dablam<br>Expedition</div>
                <p class="compare-sub-after">Often called the Matterhorn of the Himalayas. Technical, photogenic, and one of the most rewarding climbs in Nepal.</p>
                <a href="#" class="btn btn--primary" style="margin-top: 20px;">Talk to a Sherpa →</a>
            </div>
        </div>
    </section>

    <div class="end-note">
        This is a design preview only. No site files have been changed.<br>
        Approve the direction and I'll roll it into the homepage, listing pages, and detail pages.
    </div>

</body>
</html>
