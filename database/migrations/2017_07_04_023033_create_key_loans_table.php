<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKeyLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('key_loans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('key_id')->unsigned();
            $table->dateTime('date');
            $table->integer('delivery_amphitryon_id')->unsigned();
            $table->integer('return_amphitryon_id')->unsigned()->nullable();
            $table->string('return_condition',100)->nullable();
            $table->string('observations',255)->nullable();
            $table->timestamps();
            $table->foreign('key_id')->references('id')->on('keys');
            $table->foreign('delivery_amphitryon_id')->references('id')->on('amphitryons');
            $table->foreign('return_amphitryon_id')->references('id')->on('amphitryons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('key_loans');
    }
}
