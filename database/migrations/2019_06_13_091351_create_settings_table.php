<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('sitename');
            $table->string('sitename_ar');
            $table->string('sitetitle');
            $table->string('sitetitle_ar');
            $table->text('sitedes');
            $table->text('sitedes_ar');
            $table->string('icon');
            $table->string('logo');
            $table->string('home_image');
            $table->text('home_content');
            $table->text('home_content_ar');
            $table->string('about_image');
            $table->text('about_content');
            $table->text('about_content_ar');
            $table->text('about_vision');
            $table->text('about_vision_ar');
            $table->text('about_mission');
            $table->text('about_mission_ar');
            $table->text('adminoffice_address');
            $table->text('adminoffice_address_ar');
            $table->text('adminoffice_phone');
            $table->text('adminoffice_email');
            $table->text('mainstore_address');
            $table->text('mainstore_address_ar');
            $table->text('mainstore_phone');
            $table->text('mainstore_email');
            $table->text('contactinfo_des');
            $table->text('contactinfo_des_ar');
            $table->text('contactinfo_address');
            $table->text('contactinfo_address_ar');
            $table->string('contactinfo_phone');
            $table->string('contactinfo_email');
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
        Schema::dropIfExists('settings');
    }
}
