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
        Schema::create('work_processes', function (Blueprint $table) {
            $table->id();
            $table->longText('step1_title');
            $table->longText('step1_description');
            $table->longText('step1_icon');
            $table->longText('step2_title');
            $table->longText('step2_description');
            $table->longText('step2_icon');
            $table->longText('step3_title');
            $table->longText('step3_description');
            $table->longText('step3_icon');

            $table->unsignedBigInteger('home_page_id');
            $table->foreign('home_page_id')->references('id')->on('home_pages')->onDelete('cascade');
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
        Schema::dropIfExists('work_processes');
    }
};
