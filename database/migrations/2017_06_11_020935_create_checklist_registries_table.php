<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistRegistriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_registries', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->integer('turn')->unsigned();
            $table->integer('checklist_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('credential_avaliable')->unsigned();
            $table->integer('credential_delivered')->unsigned();
            $table->timestamps();
            $table->foreign('checklist_id')->references('id')->on('checklists');
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
        Schema::drop('checklist_registries');
    }
}
