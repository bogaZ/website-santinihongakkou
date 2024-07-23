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
        Schema::create('about_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('section1_title');
            $table->longText('section1_description');
            $table->longText('section1_image');
            $table->longText('section2_title');
            $table->longText('section2_description');
            $table->longText('section2_image');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('banner_id')->nullable();

            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('about_pages');
    }
};
