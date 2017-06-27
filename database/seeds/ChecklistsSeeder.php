<?php

use Illuminate\Database\Seeder;

class ChecklistsSeeder extends Seeder
{
    protected $table = 'checklists';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'property_id' => 'SCL',
        ]);
    }
}
