<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('parent_id')->nullable();
            $table->unsignedTinyInteger('part')->default(1);
            $table->string('name');
            $table->string('slug');
            $table->text('body');
            $table->enum('lang', ['en', 'ru']);
            $table->timestamp('published_at');
            $table->unsignedInteger('claps')->default(0);

            $table->unique('slug');

            $table->timestamps();

            $table->foreign('parent_id')
                    ->references('id')
                    ->on('posts')
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
        Schema::dropIfExists('posts');
    }
}
