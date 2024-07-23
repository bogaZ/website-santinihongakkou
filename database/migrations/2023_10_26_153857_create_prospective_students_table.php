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
        Schema::create('prospective_students', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('phone');
            $table->date('birth_date');
            $table->string('address');
            $table->string('city');
            $table->string('company_name');
            $table->string('position');
            $table->enum('status', ['new registrant', 'rejected', 'accepted'])->default('new registrant');
            $table->string('portfolio')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('program_id')->nullable();

            $table->foreign('program_id')
                ->references('id')
                ->on('programs')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prospective_students');
    }
};
