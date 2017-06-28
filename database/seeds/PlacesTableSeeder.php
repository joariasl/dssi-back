<?php

use Illuminate\Database\Seeder;

class PlacesTableSeeder extends Seeder
{
    protected $table = 'places';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'name' => 'SSJJ',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'name' => 'Oficina',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'name' => 'Bodega',
        ]);
    }
}
