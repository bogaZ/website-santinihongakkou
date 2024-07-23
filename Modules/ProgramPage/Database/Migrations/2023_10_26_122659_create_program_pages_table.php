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
        Schema::create('program_pages', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->longText('description');

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
        Schema::dropIfExists('program_pages');
    }
};
