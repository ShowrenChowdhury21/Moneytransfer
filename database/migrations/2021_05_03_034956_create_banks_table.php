<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {
            $table->string('id');
            $table->string('country');
            $table->string('mediumtype');
            $table->string('bankname');
            $table->string('accounttype');
            $table->string('accountname');
            $table->string('accountno')->unique();
            $table->string('ifsccode')->unique();
            $table->timestamps();

            /*
            $table->string('cardtype')->nullable();
            $table->string('cardno')->nullable();
            $table->string('holdername')->nullable();
            $table->string('expiredate')->nullable();
            $table->string('cvv')->nullable();*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
