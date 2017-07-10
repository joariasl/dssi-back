<?php

use Illuminate\Database\Seeder;

class KeysTableSeeder extends Seeder
{
    protected $table = 'keys';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'code' => 'L123',           
            'condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'K456',
            'condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N789',           
            'condition_id' => '2',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N729',           
            'condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N589',           
            'condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Q911',           
            'condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'C734',           
            'condition_id' => '2',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'H359',           
            'condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N134',           
            'condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Y239',           
            'condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'B356',           
            'condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'A409',           
            'condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Ñ119',           
            'condition_id' => '2',
            'property_id' => 'SCL',
        ]);
    }
}
