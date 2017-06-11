<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChecklistItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checklist_items', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('checklist_id')->unsigned();
            $table->integer('checklist_item_group_id')->unsigned();
            $table->string('name',100);
            $table->boolean('status');
            $table->timestamps();
            $table->foreign('checklist_id')->references('id')->on('checklists');
            $table->foreign('checklist_item_group_id')->references('id')->on('checklist_item_groups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('checklist_items');
    }
}
