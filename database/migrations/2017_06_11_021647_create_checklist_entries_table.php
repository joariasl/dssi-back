<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_entries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checklist_registry_id')->unsigned();
            $table->integer('checklist_item_id')->unsigned();
            $table->boolean('response');
            $table->string('observations',255);
            $table->timestamps();
            $table->foreign('checklist_registry_id')->references('id')->on('checklist_registers');
            $table->foreign('checklist_item_id')->references('id')->on('checklist_items');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('checklist_entries');
    }
}
