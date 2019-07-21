<?php

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
            $table->string('avatar')->nullable();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->string('country');
            $table->string('email');
            $table->string('phone');
            $table->string('note')->nullable();
            $table->bigInteger('group_id')->unsigned()->index()->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('contacts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
