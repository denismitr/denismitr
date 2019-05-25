<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name_ru', 20);
            $table->string('first_name_en', 20);
            $table->string('last_name_ru', 35);
            $table->string('last_name_en', 35);
            $table->text('about_ru')->nullable();
            $table->text('about_en')->nullable();
            $table->string('email')->unique();
            $table->string('twitter');
            $table->string('facebook')->nullable();
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
        Schema::dropIfExists('businesses');
    }
}
