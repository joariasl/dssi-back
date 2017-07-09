<?php

use Illuminate\Database\Seeder;

class ChecklistItemGroupsSeeder extends Seeder
{
    protected $table = 'checklist_item_groups';

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
            'name' => 'Operatividad',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'checklist_id' => '1',
            'name' => 'Actividad',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'checklist_id' => '2',
            'name' => 'Operatividad',
        ]);

    }
}
