<?php

namespace Modules\Program\Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\Program\Entities\Program;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class ProgramDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $role = Role::create(['name' => 'Program']);
        $user = User::find(1);
        $permissions = [
            ['name' => 'read program'],
            ['name' => 'update program'],
            ['name' => 'delete program'],
            ['name' => 'create program']
        ];
        foreach ($permissions as $value) {
            Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
        $programs = [
            'Caregiver',
            'Pelayan',
            'Pekerjaan Magang',
            'Asisten Kesehatan',
            'Asisten Keperawatan',
        ];

        foreach ($programs as $programName) {
            Program::create([
                'title' => $programName,
                'image' => 'default',
                'short_content' => 'Deskripsi singkat untuk ' . $programName,
                'content' => 'Konten lengkap untuk ' . $programName,
                'slug' => Str::slug($programName),
                'created_by' => 1,
                'updated_by' => 1
            ]);
        }
    }
}
