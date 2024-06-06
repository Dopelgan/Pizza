<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {

            $table->unsignedBigInteger('id', true);
            $table->string('code');
            $table->string('hash');
            $table->unsignedInteger('amount');
            $table->string('status');
            $table->string('status_courier');
            $table->timestamp('ready_at');
            $table->string('phone');
            $table->string('street');
            $table->string('floor');
            $table->string('entrance');
            $table->string('house');
            $table->string('apartment');
            $table->longText('comment')->nullable();
            $table->unsignedBigInteger('client_id')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('status_courier');
            $table->unique('code');
            $table->index('client_id');

            $table->foreign('client_id')->references('id')->on('clients')->onDelete('SET NULL');

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
}
