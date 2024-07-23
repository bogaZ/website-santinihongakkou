<?php

namespace Modules\Feature\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Modules\Feature\Entities\Feature;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class FeatureDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $role = Role::create(['name' => 'Feature']);
        $user = User::find(1);
        $permissions = [
            ['name' => 'read feature'],
            ['name' => 'update feature'],
            ['name' => 'delete feature'],
            ['name' => 'create feature']
        ];
        foreach ($permissions as $value) {
            Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }

        $features = [
            [
                'title' => 'Pelatihan Kerja Kualitas',
                'icon' => 'pe-7s-album',
                'short_content' => 'Kami menyediakan pelatihan kerja berkualitas.',
                'content' => 'Dapatkan pelatihan kerja yang sesuai dengan kebutuhan Anda di sini.',
                'slug' => 'pelatihan-kerja-kualitas',
            ],
            [
                'title' => 'Karir Sukses',
                'icon' => 'pe-7s-album',
                'short_content' => 'Bangun karir sukses dengan bantuan kami.',
                'content' => 'Temukan peluang karir yang menjanjikan melalui pelatihan kami.',
                'slug' => 'karir-sukses',
            ],
            [
                'title' => 'Kemampuan Profesional',
                'icon' => 'pe-7s-album',
                'short_content' => 'Tingkatkan kemampuan profesional Anda.',
                'content' => 'Dapatkan pelatihan yang membantu Anda tumbuh sebagai profesional.',
                'slug' => 'kemampuan-profesional',
            ],
        ];

        foreach ($features as $featureData) {
            Feature::create($featureData);
        }
    }
}
