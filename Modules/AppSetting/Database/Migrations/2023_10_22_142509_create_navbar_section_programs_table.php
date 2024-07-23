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
        Schema::create('navbar_section_programs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('navbar_section_id')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('navbar_section_id')->references('id')->on('navbar_sections')->onDelete('cascade');
            $table->foreign('program_id')->references('id')->on('programs')->onDelete('cascade');
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
        Schema::dropIfExists('navbar_section_programs');
    }
};
