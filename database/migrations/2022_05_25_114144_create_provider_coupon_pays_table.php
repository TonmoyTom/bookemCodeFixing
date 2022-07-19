<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProviderCouponPaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provider_coupon_pays', function (Blueprint $table) {
            $table->id();
            $table->string('order_no')->nullable();
            $table->integer('provider_id')->nullable();
            $table->integer('coupon_id')->nullable();
            $table->string('payment_id')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('balance_transaction')->nullable();
            $table->string('currency')->nullable();
            $table->decimal('amount')->nullable();

            $table->string('payment_status')->nullable();
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
        Schema::dropIfExists('provider_coupon_pays');
    }
}
