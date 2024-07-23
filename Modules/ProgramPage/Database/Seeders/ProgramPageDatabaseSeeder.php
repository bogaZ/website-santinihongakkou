<?php

namespace Modules\ProgramPage\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\ProgramPage\Entities\ProgramPage;

class ProgramPageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        ProgramPage::create([
            'title' => [
                'en' => 'Program Title in English',
                'id' => 'Judul Program dalam Bahasa Indonesia',
            ],
            'description' => [
                'en' => 'Program Description in English',
                'id' => 'Deskripsi Program dalam Bahasa Indonesia',
            ],
            'banner_id' => 1,
            'updated_by' => 1,
        ]);
        $role = \Spatie\Permission\Models\Role::create(['name' => 'Pages: Program Page']);
        $user = \App\Models\User::find(1);
        $permissions = [
            ['name' => 'read program page'],
            ['name' => 'update program page'],
        ];
        foreach ($permissions as $value) {
            \Spatie\Permission\Models\Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
    }
}
