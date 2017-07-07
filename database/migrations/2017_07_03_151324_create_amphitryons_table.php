<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmphitryonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amphitryons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('person_rut', 9)->unique();
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->date('admission_date');
            $table->date('retirement_date');
            $table->timestamps();
            $table->foreign('person_rut')->references('rut')->on('people');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('amphitryons');
    }
}
