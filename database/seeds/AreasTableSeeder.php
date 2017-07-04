<?php

use Illuminate\Database\Seeder;

class AreasTableSeeder extends Seeder
{
    protected $table = 'areas';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'name' => 'Juegos',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'name' => 'Hotel',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'name' => 'RRHH',
        ]);
    }
}
