<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('subtotal')->nullable();
            $table->string('shipping_charge')->nullable();
            $table->string('total')->nullable();
            $table->string('status');
            $table->text('additional_info')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('city')->nullable();
            $table->string('address')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->date('cancel_date')->nullable();
            $table->date('processed_date')->nullable();
            $table->date('shipping_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->string('cancel_reason')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
