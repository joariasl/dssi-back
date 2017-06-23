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
            $table->string('delivery_rut', 9);
            $table->string('return_rut', 9)->nullable();
            $table->string('return_condition',100)->nullable();
            $table->string('observations',255)->nullable();
            $table->timestamps();
            $table->foreign('key_id')->references('id')->on('keys');
            $table->foreign('delivery_rut')->references('rut')->on('people');
            $table->foreign('return_rut')->references('rut')->on('people');
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
