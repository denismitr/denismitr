<?php

use App\Models\Contact;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->ipAddress('ip');
            $table->string('hash');
            $table->string('name');
            $table->text('body');
            $table->string('email');
            $table->string('status')->default(Contact::STATUS_PENDING);
            $table->boolean('is_spam')->default(false);
            $table->timestamps();

            $table->index('status');

            $table->unique('hash');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
