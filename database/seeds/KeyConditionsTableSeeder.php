<?php

use Illuminate\Database\Seeder;

class KeyConditionsTableSeeder extends Seeder
{
    protected $table = 'key_conditions';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'name' => 'Operativa',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'name' => 'Quebrada',
        ]);
    }
}
