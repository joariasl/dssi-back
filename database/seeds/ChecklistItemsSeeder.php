<?php

use Illuminate\Database\Seeder;

class ChecklistItemsSeeder extends Seeder
{
    protected $table = 'checklist_items';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'checklist_id' => '1',
            'checklist_item_group_id' => '1',
            'name' => 'Item1',
            'status' => '1',
        ]);
    }
}
