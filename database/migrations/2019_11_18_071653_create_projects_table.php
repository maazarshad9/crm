<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->unsignedInteger('total_price')->nullable();
            $table->unsignedInteger('booking_price')->nullable();
            $table->unsignedInteger('allocation_price')->nullable();
            $table->unsignedInteger('confirmation_price')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->date('start_date')->nullable();
            $table->date('last_date')->nullable();
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('leads');
            $table->foreign('owner_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
