<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('package_type');
            $table->string('package_size');
            $table->longText('package_desc');
            $table->longText('pickup_location');
            $table->bigInteger('receiver_number');
            $table->string('receiver_email');
            $table->longText('package_image');
            $table->string('payment_method');
            $table->string('delivery_type');
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
        Schema::dropIfExists('requests');
    }
}
