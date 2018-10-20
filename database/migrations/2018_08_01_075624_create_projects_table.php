<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('customer_id')->nullable();
            $table->string('name');
            $table->string('url')->nullable();
            $table->text('description_en');
            $table->text('description_ru');
            $table->timestamp('published_at')->nullable();
            $table->string('picture')->nullable();
            $table->string('color', 10)->nullable();
            $table->unsignedTinyInteger('priority')->default(0);
            $table->timestamps();

            $table->foreign('customer_id')
                ->references('id')
                ->on('customers')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
