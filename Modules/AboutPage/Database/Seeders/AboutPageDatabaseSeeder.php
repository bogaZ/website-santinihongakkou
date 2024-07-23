<?php

namespace Modules\AboutPage\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\AboutPage\Entities\AboutPage;

class AboutPageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $role = \Spatie\Permission\Models\Role::create(['name' => 'Pages: About Page']);
        $user = \App\Models\User::find(1);
        $permissions = [
            ['name' => 'read about page'],
            ['name' => 'update about page'],
        ];
        foreach ($permissions as $value) {
            \Spatie\Permission\Models\Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
        AboutPage::create([
            'section1_title' => [
                'id' => 'Visi & Misi',
            ],
            'section1_image' => 'default',
            'section2_image' => 'default',
            'section1_description' => [
                'id' => 'Deskripsi Bahasa Indonesia Bagian 1',
            ],
            'section2_title' => [
                'id' => 'Legalitas',
            ],
            'section2_description' => [
                'id' => 'Deskripsi Bahasa Indonesia Bagian 2',
            ],
            'updated_by' => 1,
            'banner_id' => 1,
        ]);
    }
}
