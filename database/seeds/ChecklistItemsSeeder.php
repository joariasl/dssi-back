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
            'name' => 'Equipo radial',
            'status' => '1',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'checklist_id' => '1',
            'checklist_item_group_id' => '1',
            'name' => 'Computador',
            'status' => '1',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'checklist_id' => '1',
            'checklist_item_group_id' => '2',
            'name' => 'Retiro de basura',
            'status' => '1',
        ]);
    }
}
