<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('lead_id');
            $table->unsignedBigInteger('property_id');
            $table->unsignedBigInteger('user_id');
            $table->double('total_amount')->unsigned();
            $table->double('paid_amount')->unsigned()->nullable();
            $table->double('pending_amount')->unsigned()->nullable();
            $table->double('monthly_payable')->unsigned()->nullable();
            $table->integer('payment_recurrence')->unsigned()->nullable();
            $table->integer('installment_duration')->unsigned()->nullable();
            $table->boolean('installment_active')->default(false);
            $table->timestamps();
            $table->foreign('property_id')->references('id')->on('properties');
            $table->foreign('lead_id')->references('id')->on('leads');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
