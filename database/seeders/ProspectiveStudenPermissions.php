<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProspectiveStudenPermissions extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = \Spatie\Permission\Models\Role::create(['name' => 'Prospective Student']);
        $user = \App\Models\User::find(1);
        $permissions = [
            ['name' => 'read prospective student'],
            ['name' => 'delete prospective student'],
        ];
        foreach ($permissions as $value) {
            \Spatie\Permission\Models\Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
    }
}
