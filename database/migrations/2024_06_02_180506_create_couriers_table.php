<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('couriers', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            $table->string('first_name');
            $table->string('second_name');
            $table->string('login');
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();

            $table->unique('login');
        });

        Schema::table('orders', function(Blueprint $table){

            $table->unsignedBigInteger('courier_id')->nullable();

            $table->index('courier_id');

            $table->foreign('courier_id')
                ->references('id')
                ->on('couriers')
                ->onDelete('SET NULL');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('couriers');
    }
}
