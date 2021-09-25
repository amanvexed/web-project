<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaystacklogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paystacklogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('reference');
            $table->string('paystack_id');
            $table->string('amount');
            $table->string('status');
            $table->string('paystack_status');
            $table->string('domain');
            $table->string('message')->nullable();
            $table->string('gateway_response');
            $table->dateTime('paystack_paid_at');
            $table->dateTime('paystack_created_at');
            $table->string('channel');
            $table->string('currency');
            $table->string('ip_address');
            $table->string('mobilenumber')->nullable();
            $table->json("full_response");
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
        Schema::dropIfExists('paystacklogs');
    }
}
