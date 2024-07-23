<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StructureOrganizationPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'Organization Structure']);
        $user = \App\Models\User::find(1);
        $permissions = [
            ['name' => 'create organization structure'],
            ['name' => 'update organization structure'],
            ['name' => 'read organization structure'],
            ['name' => 'delete organization structure'],
        ];
        foreach ($permissions as $value) {
            \Spatie\Permission\Models\Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
    }
}
