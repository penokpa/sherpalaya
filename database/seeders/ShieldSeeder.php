<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use BezhanSalleh\FilamentShield\Support\Utils;
use Spatie\Permission\PermissionRegistrar;

class ShieldSeeder extends Seeder
{
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $rolesWithPermissions = '[{"name":"super_admin","guard_name":"web","permissions":["view_destination","view_any_destination","create_destination","update_destination","restore_destination","restore_any_destination","replicate_destination","reorder_destination","delete_destination","delete_any_destination","force_delete_destination","force_delete_any_destination","view_media","view_any_media","create_media","update_media","restore_media","restore_any_media","replicate_media","reorder_media","delete_media","delete_any_media","force_delete_media","force_delete_any_media","view_role","view_any_role","create_role","update_role","delete_role","delete_any_role","view_trek","view_any_trek","create_trek","update_trek","restore_trek","restore_any_trek","replicate_trek","reorder_trek","delete_trek","delete_any_trek","force_delete_trek","force_delete_any_trek","view_user","view_any_user","create_user","update_user","restore_user","restore_any_user","replicate_user","reorder_user","delete_user","delete_any_user","force_delete_user","force_delete_any_user","view_category","view_any_category","create_category","update_category","restore_category","restore_any_category","replicate_category","reorder_category","delete_category","delete_any_category","force_delete_category","force_delete_any_category","view_contact::us","view_any_contact::us","create_contact::us","update_contact::us","restore_contact::us","restore_any_contact::us","replicate_contact::us","reorder_contact::us","delete_contact::us","delete_any_contact::us","force_delete_contact::us","force_delete_any_contact::us","view_expedition","view_any_expedition","create_expedition","update_expedition","restore_expedition","restore_any_expedition","replicate_expedition","reorder_expedition","delete_expedition","delete_any_expedition","force_delete_expedition","force_delete_any_expedition","view_faq","view_any_faq","create_faq","update_faq","restore_faq","restore_any_faq","replicate_faq","reorder_faq","delete_faq","delete_any_faq","force_delete_faq","force_delete_any_faq","view_inquiry","view_any_inquiry","create_inquiry","update_inquiry","restore_inquiry","restore_any_inquiry","replicate_inquiry","reorder_inquiry","delete_inquiry","delete_any_inquiry","force_delete_inquiry","force_delete_any_inquiry","view_our::sherpa","view_any_our::sherpa","create_our::sherpa","update_our::sherpa","restore_our::sherpa","restore_any_our::sherpa","replicate_our::sherpa","reorder_our::sherpa","delete_our::sherpa","delete_any_our::sherpa","force_delete_our::sherpa","force_delete_any_our::sherpa","view_region","view_any_region","create_region","update_region","restore_region","restore_any_region","replicate_region","reorder_region","delete_region","delete_any_region","force_delete_region","force_delete_any_region","view_review","view_any_review","create_review","update_review","restore_review","restore_any_review","replicate_review","reorder_review","delete_review","delete_any_review","force_delete_review","force_delete_any_review","view_service","view_any_service","create_service","update_service","restore_service","restore_any_service","replicate_service","reorder_service","delete_service","delete_any_service","force_delete_service","force_delete_any_service","view_tour","view_any_tour","create_tour","update_tour","restore_tour","restore_any_tour","replicate_tour","reorder_tour","delete_tour","delete_any_tour","force_delete_tour","force_delete_any_tour","page_SettingPage","page_ManageAboutUs","page_ManageCompany","page_ManageContactUs","page_ManageLandingPage","page_ManageLegal","page_ManagePage","widget_SettingsOverview","widget_OverlookWidget","widget_StatWidget","page_ManageCache"]}]';
        $directPermissions = '[]';

        static::makeRolesWithPermissions($rolesWithPermissions);
        static::makeDirectPermissions($directPermissions);

        $this->command->info('Shield Seeding Completed.');
    }

    protected static function makeRolesWithPermissions(string $rolesWithPermissions): void
    {
        if (! blank($rolePlusPermissions = json_decode($rolesWithPermissions, true))) {
            /** @var Model $roleModel */
            $roleModel = Utils::getRoleModel();
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($rolePlusPermissions as $rolePlusPermission) {
                $role = $roleModel::firstOrCreate([
                    'name' => $rolePlusPermission['name'],
                    'guard_name' => $rolePlusPermission['guard_name'],
                ]);

                if (! blank($rolePlusPermission['permissions'])) {
                    $permissionModels = collect($rolePlusPermission['permissions'])
                        ->map(fn ($permission) => $permissionModel::firstOrCreate([
                            'name' => $permission,
                            'guard_name' => $rolePlusPermission['guard_name'],
                        ]))
                        ->all();

                    $role->syncPermissions($permissionModels);
                }
            }
        }
    }

    public static function makeDirectPermissions(string $directPermissions): void
    {
        if (! blank($permissions = json_decode($directPermissions, true))) {
            /** @var Model $permissionModel */
            $permissionModel = Utils::getPermissionModel();

            foreach ($permissions as $permission) {
                if ($permissionModel::whereName($permission)->doesntExist()) {
                    $permissionModel::create([
                        'name' => $permission['name'],
                        'guard_name' => $permission['guard_name'],
                    ]);
                }
            }
        }
    }
}
