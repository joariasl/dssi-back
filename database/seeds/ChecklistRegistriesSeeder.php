<?php

use Illuminate\Database\Seeder;

class ChecklistRegistriesSeeder extends Seeder
{
    protected $table = 'checklist_registries';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For checklist_id = 2
        DB::table($this->table)->insert([
            'id' => '1',
            'date' => '2017-06-18',
            'turn' => '1',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '5',
            'credential_delivered' => '10',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'date' => '2017-06-18',
            'turn' => '2',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '11',
        ]);
        // For checklist_id = 2
        DB::table($this->table)->insert([
            'id' => '3',
            'date' => '2017-06-27',
            'turn' => '1',
            'checklist_id' => '2',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '2',
        ]);
    }
}
