<?php

namespace Modules\Partnership\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PartnershipDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $role = Role::create(['name' => 'Partnership']);
        $user = User::find(1);
        $permissions = [
            ['name' => 'read partnership'],
            ['name' => 'update partnership'],
            ['name' => 'delete partnership'],
            ['name' => 'create partnership']
        ];
        foreach ($permissions as $value) {
            Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
        $companies = [
            'Google Inc.',
            'Apple Inc.',
            'Microsoft Corporation',
            'Amazon.com Inc.',
            'Facebook, Inc.',
            'Tesla, Inc.',
            'Alphabet Inc.',
            'Netflix, Inc.',
            'Twitter, Inc.',
            'Oracle Corporation',
            'IBM Corporation',
            'Adobe Inc.',
        ];

        foreach ($companies as $companyName) {
            \Modules\Partnership\Entities\Partnership::create([
                'title' => $companyName,
                'image' => 'default',
                'content' => 'Deskripsi perusahaan ' . $companyName,
                'link' => 'https://' . str()->slug($companyName) . '.com',
                'slug' => str()->slug($companyName),
            ]);
        }
    }
}
