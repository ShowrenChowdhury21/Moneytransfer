<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('sender');
            $table->string('sendercountry')->nullable();
            $table->string('sendercurrency');
            $table->float('amountsend');
            $table->string('reference')->nullable();
            $table->string('reciever')->nullable();
            $table->string('recievercurrency');
            $table->float('amountrecieved');
            $table->string('sendtype');
            $table->string('sendertype');
            $table->string('bankname')->nullable();
            $table->string('accounttype')->nullable();
            $table->string('accountname')->nullable();
            $table->string('accountno')->nullable();
            $table->string('ifsccode')->nullable();
            $table->string('state')->nullable();
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
        Schema::dropIfExists('transactions');
    }
}
