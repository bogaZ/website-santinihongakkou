<?php

namespace Database\Seeders;

use App\Models\OrganizationalStructure;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationalStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrganizationalStructure::insert([
            [
                'name' => 'Santi',
                'image' => 'https://santinihongakkou.com/images-team/santi.webp',
                'occupation' => 'Pemilik'
            ],
            [
                'name' => 'Eko andriawan',
                'image' => 'https://santinihongakkou.com/images-team/eko.webp',
                'occupation' => 'Bendahara'
            ],
            [
                'name' => 'Fithriyan Munawwir',
                'image' => 'https://santinihongakkou.com/images-team/guru1.webp',
                'occupation' => 'Pengajar (Guru Bahasa Jepang)'
            ],
            [
                'name' => 'Yuni kurniawati',
                'image' => 'https://santinihongakkou.com/images-team/guru2.webp',
                'occupation' => 'Pengajar (Guru Bahasa Jepang)'
            ],
        ]);
    }
}
