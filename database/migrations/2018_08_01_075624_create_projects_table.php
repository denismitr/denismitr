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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('url')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('picture')->nullable()->unique();
            $table->string('disk', '50')->default('public');
            $table->string('color', 10);
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
