<?php

use Illuminate\Database\Seeder;

class ChecklistEntriesSeeder extends Seeder
{
    protected $table = 'checklist_entries';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'checklist_registry_id' => '1',
            'checklist_item_id' => '1',
            'response' => '1',
            'observations' => 'Observación',
        ]);
    }
}
