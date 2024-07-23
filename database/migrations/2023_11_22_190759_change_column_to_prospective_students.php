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
        Schema::table('prospective_students', function (Blueprint $table) {
            $table->dropColumn("company_name");
            $table->dropColumn("position");
            $table->dropColumn("city");
            $table->string("number_of_siblings")->nullable();
            $table->string("order_of_siblings")->nullable();
            $table->string("place_of_birth")->nullable();
            $table->enum("gender", ["pria", "wanita"])->default("pria");
            $table->enum("last_education", ["smp", "sma", "s1", "s2"])->default("smp")->nullable();
            $table->enum("japanese_language_proficiency_certificate", ["n5", "n4", "n3", "n2", "none"])->default("none")->nullable();
            $table->unsignedBigInteger('program_type_id')->nullable();
            $table->string('identity_number')->nullable();
            $table->foreign('program_type_id')
                ->references('id')
                ->on('program_types')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prospective_students', function (Blueprint $table) {
            $table->dropForeign("prospective_students_program_type_id_foreign");
            $table->dropColumn('program_type_id');
            $table->dropColumn('place_of_birth');
            $table->string('company_name')->nullable();
            $table->dropColumn('identity_number');
            $table->string('position')->nullable();
            $table->string('city')->nullable();
            $table->dropColumn('number_of_siblings');
            $table->dropColumn('gender');
            $table->dropColumn("order_of_siblings");
            $table->dropColumn('last_education');
            $table->dropColumn('japanese_language_proficiency_certificate');
        });
    }
};
