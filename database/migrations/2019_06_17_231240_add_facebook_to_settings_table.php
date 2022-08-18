<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFacebookToSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('twitter')->nullable();
            $table->text('linkedin')->nullable();
            $table->text('pinterest')->nullable();
            $table->string('lat');
            $table->string('lng');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
          $table->dropColumn('facebook');
          $table->dropColumn('instagram');
          $table->dropColumn('twitter');
          $table->dropColumn('linkedin');
          $table->dropColumn('pinterest');
        });
    }
}
