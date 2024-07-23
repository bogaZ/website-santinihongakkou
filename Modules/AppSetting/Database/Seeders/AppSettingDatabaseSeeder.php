<?php

namespace Modules\AppSetting\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\AppSetting\Entities\NavbarSection;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class AppSettingDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $NavbarSection = NavbarSection::create([]);
        \Modules\AppSetting\Entities\AppSetting::create([
            'app_name' => 'Nama Aplikasi Anda',
            'icon' => 'default',
            'app_detail' => 'Deskripsi singkat tentang aplikasi Anda',
            'email' => 'info@example.com',
            'phone' => '+1 (123) 456-7890',
            'facebook' => 'https://www.facebook.com/example',
            'instagram' => 'https://www.instagram.com/example',
            'linkedln' => 'https://www.linkedin.com/company/example',
            'tiktok' => 'https://www.tiktok.com/@example',
            'youtube' => 'https://www.youtube.com/c/example',
            'whatsapp' => '+1 (123) 456-7890',
            'address' => 'Alamat Anda',
            'address2' => 'Alamat Lanjutan (Opsional)',
            'updated_by' => 1,
            'navbar_section_id' => 1,
        ]);
        $role = Role::create(['name' => 'App Settings']);
        $user = User::find(1);
        $permissions = [
            ['name' => 'read app settings'],
            ['name' => 'update app settings'],
        ];
        foreach ($permissions as $value) {
            Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
    }
}