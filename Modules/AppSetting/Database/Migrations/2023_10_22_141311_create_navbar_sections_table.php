<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navbar_sections', function (Blueprint $table) {
            $table->id();
            $table->string('label_home')->default('Beranda');
            $table->string('label_about_us')->default('Tentang Kami');
            $table->string('label_our_program')->default('Program Kami');
            $table->string('label_our_contact')->default('Kontak Kami');
            $table->string('label_btn_contact_us')->default('Hubungi Kami');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navbar_sections');
    }
};
