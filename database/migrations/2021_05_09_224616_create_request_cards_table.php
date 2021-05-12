<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_cards', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('name');
            $table->string('cardno')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('cardcode')->unique();
            $table->string('expiredate');
            $table->string('state')->default('pending');
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
        Schema::dropIfExists('request_cards');
    }
}
