<?php

namespace Modules\HomePage\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class HomePageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $role = Role::create(['name' => 'Pages: Home Page']);
        $user = User::find(1);
        $permissions = [
            ['name' => 'read home page'],
            ['name' => 'update home page'],
        ];
        foreach ($permissions as $value) {
            Permission::create($value);
            $role->givePermissionTo($value);
            $user->givePermissionTo($value);
        }
        \Modules\HomePage\Entities\HomePage::create([
            'section1_title' => 'Welcome',
            'section1_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
            'section2_title' => 'Gapai Mimpimu Bersama Kami',
            'section2_btn_label' => 'Hubungi Kami',
            'section2_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
            'section3_title' => 'PROGRAM KAMI',
            'section3_btn_label' => 'Program Lainnya',
            'section3_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
            'section4_title' => 'GALERI KAMI',
            'section4_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
            'section5_title' => 'MITRA KAMI',
            'section5_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
            'section6_title' => 'CARA KERJA',
            'section6_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
            'section7_title' => 'KONTAK KAMI',
            'section7_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit...',
        ]);
        \Modules\HomePage\Entities\WorkProcess::create([
            'step1_title' => 'Pendaftaran',
            'step1_description' => 'The Big Oxmox advised her not to do so.',
            'step1_icon' => 'pe-7s-pen',
            'step2_title' => 'Kirim Formulir',
            'step2_description' => 'Little Blind Text didn’t listen.',
            'step2_icon' => 'pe-7s-id',
            'step3_title' => 'Pelatihan',
            'step3_description' => 'When she reached the first hills. itu default valuenya',
            'step3_icon' => 'pe-7s-target',
            'home_page_id' => 1
        ]);
    }
}
