<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVtpasslogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vtpasslogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('transactionid')->unique();
            $table->string('serviceid');
            $table->string('product');
            //$table->tinyInteger('phonenumber')->unique();
            $table->bigInteger('mobilenumber');//->default('00000000000');//->unique();
            $table->string('paystack_reference')->nullable();
            $table->string('amount');
            $table->string('status');
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
        Schema::dropIfExists('vtpasslogs');
    }
}
