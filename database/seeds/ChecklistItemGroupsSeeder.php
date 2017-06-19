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
            'name' => 'Grupo1',
        ]);
    }
}
