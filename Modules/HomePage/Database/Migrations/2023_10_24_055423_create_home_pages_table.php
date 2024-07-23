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
        Schema::create('home_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('section1_title');
            $table->longText('section1_description');

            $table->longText('section2_title');
            $table->longText('section2_btn_label');
            $table->longText('section2_description');

            $table->longText('section3_title');
            $table->longText('section3_btn_label');
            $table->longText('section3_description');

            $table->longText('section4_title');
            $table->longText('section4_description');

            $table->longText('section5_title');
            $table->longText('section5_description');

            $table->longText('section6_title');
            $table->longText('section6_description');

            $table->longText('section7_title');
            $table->longText('section7_description');

            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('banner_id')->nullable();

            $table->foreign('banner_id')->references('id')->on('banners')->onDelete('cascade');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
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
        Schema::dropIfExists('home_pages');
    }
};
