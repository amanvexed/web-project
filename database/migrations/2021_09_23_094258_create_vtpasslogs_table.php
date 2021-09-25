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
            $table->string('vtpass_status')->nullable();
            $table->string('product_name')->nullable();
            $table->string('unique_element')->nullable();
            $table->string('unit_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('service_verification')->nullable();
            $table->string('channel')->nullable();
            $table->string('commission')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('discount')->nullable();
            $table->string('type')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('name')->nullable();
            $table->string('convinience_fee')->nullable();
            $table->string('response_description')->nullable();
            $table->dateTime('transaction_date')->nullable();
            $table->string('amount');
            $table->string('platform')->nullable();;
            $table->string('method')->nullable();;
            $table->string('transactionid')->unique();
            $table->string('serviceid');
            $table->string('variationcode');
            $table->string('status');
            $table->json('full_response')->nullable();
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
