<?php

use Illuminate\Database\Seeder;

class ChecklistRegistersSeeder extends Seeder
{
    protected $table = 'checklist_registers';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'turn' => '1',
            'checklist_id' => '1',
            'user_id' => '1',
            'credential_avaliable' => '5',
            'credential_delivered' => '10',
        ]);
    }
}
