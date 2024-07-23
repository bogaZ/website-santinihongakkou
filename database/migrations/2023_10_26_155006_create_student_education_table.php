<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student_education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prospective_student_id');
            $table->string('school_name');
            $table->string('degree');
            $table->integer('graduation_year');
            $table->foreign('prospective_student_id')
                ->references('id')
                ->on('prospective_students')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_education');
    }
};
