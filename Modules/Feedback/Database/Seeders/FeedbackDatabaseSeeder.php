<?php

namespace Modules\Feedback\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class FeedbackDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $role = Role::create(['name' => 'Feedback']);
        $user = User::find(1);
        $permissions = [
            ['name' => 'read feedback'],
            ['name' => 'delete feedback']
        ];
        foreach ($permissions as $value) {
            Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
    }
}
