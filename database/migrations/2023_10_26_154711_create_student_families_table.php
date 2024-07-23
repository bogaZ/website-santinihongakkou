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
        Schema::create('student_families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prospective_student_id');
            $table->string('relationship');
            $table->string('name');
            $table->integer('age');
            $table->string('occupation');
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
        Schema::dropIfExists('student_families');
    }
};
