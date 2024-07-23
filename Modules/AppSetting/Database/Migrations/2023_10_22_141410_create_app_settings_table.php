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
        Schema::create('app_settings', function (Blueprint $table) {
            $table->id();
            $table->string("app_name")->default("Rengggani Karya Semesta");
            $table->string("icon")->nullable();
            $table->longText("app_detail")->nullable();
            $table->longText("email")->nullable();
            $table->longText("phone")->nullable();
            $table->longText("facebook")->nullable();
            $table->longText("instagram")->nullable();
            $table->longText("linkedln")->nullable();
            $table->longText("tiktok")->nullable();
            $table->longText("youtube")->nullable();
            $table->longText("whatsapp")->nullable();
            $table->longText("address")->nullable();
            $table->longText("address2")->nullable();
            $table->string("email2")->nullable();
            $table->string("email3")->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->unsignedBigInteger('navbar_section_id')->default(1)->nullable();
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('navbar_section_id')->references('id')->on('navbar_sections')->onDelete('set null');
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
        Schema::dropIfExists('app_settings');
    }
};