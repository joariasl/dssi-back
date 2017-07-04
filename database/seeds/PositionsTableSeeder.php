<?php

use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    protected $table = 'positions';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'name' => 'Croupier',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'name' => 'Garzón',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'name' => 'Ingeniero',
        ]);
    }
}
