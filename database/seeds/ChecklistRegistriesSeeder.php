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
        // For checklist_id = 1
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
        DB::table($this->table)->insert([
            'id' => '3',
            'date' => '2017-06-18',
            'turn' => '3',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '6',
            'credential_delivered' => '9',
        ]);
        // For checklist_id = 2
        DB::table($this->table)->insert([
            'id' => '4',
            'date' => '2017-06-27',
            'turn' => '1',
            'checklist_id' => '2',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '2',
        ]);
        // For checklist_id = 1
        DB::table($this->table)->insert([
            'date' => '2017-06-17',
            'turn' => '1',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '5',
            'credential_delivered' => '10',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-17',
            'turn' => '2',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '11',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-17',
            'turn' => '3',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '6',
            'credential_delivered' => '9',
        ]);
        // For checklist_id = 1
        DB::table($this->table)->insert([
            'date' => '2017-06-16',
            'turn' => '1',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '5',
            'credential_delivered' => '10',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-16',
            'turn' => '2',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '11',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-16',
            'turn' => '3',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '6',
            'credential_delivered' => '9',
        ]);
        // For checklist_id = 1
        DB::table($this->table)->insert([
            'date' => '2017-06-15',
            'turn' => '1',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '5',
            'credential_delivered' => '10',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-15',
            'turn' => '2',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '11',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-15',
            'turn' => '3',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '6',
            'credential_delivered' => '9',
        ]);
        // For checklist_id = 1
        DB::table($this->table)->insert([
            'date' => '2017-06-14',
            'turn' => '1',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '5',
            'credential_delivered' => '10',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-14',
            'turn' => '2',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '11',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-141',
            'turn' => '3',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '6',
            'credential_delivered' => '9',
        ]);
        // For checklist_id = 1
        DB::table($this->table)->insert([
            'date' => '2017-06-13',
            'turn' => '1',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '5',
            'credential_delivered' => '10',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-13',
            'turn' => '2',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '4',
            'credential_delivered' => '11',
        ]);
        DB::table($this->table)->insert([
            'date' => '2017-06-13',
            'turn' => '3',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '6',
            'credential_delivered' => '9',
        ]);
    }
}
