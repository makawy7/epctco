<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('name');
            $table->string('name_ar');
            $table->string('role');
            $table->string('role_ar');
            $table->text('des')->nullable();
            $table->text('des_ar')->nullable();
            $table->text('facebook')->nullable();
            $table->text('instagram')->nullable();
            $table->text('linkedin')->nullable();
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
        Schema::dropIfExists('members');
    }
}
