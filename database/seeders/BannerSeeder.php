<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Banner::create([
            "image_desktop" => 'default',
            "title" => "Santi Nihon Gakkou",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt illum laboriosam iure nostrum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt illum laboriosam iure nostrum.",
            "button_label" => "Hubungi Kami",
            "button_link" => "https://api.whatsapp.com/send?phone=6285234104446"
        ]);
        Banner::create([
            "image_desktop" => 'default',
            "title" => "Program Kami",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt illum laboriosam iure nostrum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt illum laboriosam iure nostrum.",
            "button_label" => "Hubungi Kami",
            "button_link" => "https://api.whatsapp.com/send?phone=6285234104446"
        ]);
        Banner::create([
            "image_desktop" => 'default',
            "title" => "Tentang Kami",
            "description" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt illum laboriosam iure nostrum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt illum laboriosam iure nostrum.",
            "button_label" => "Hubungi Kami",
            "button_link" => "https://api.whatsapp.com/send?phone=6285234104446"
        ]);
    }
}
