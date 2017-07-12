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
            'key_condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'K456',
            'key_condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N789',           
            'key_condition_id' => '2',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N729',           
            'key_condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N589',           
            'key_condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Q911',           
            'key_condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'C734',           
            'key_condition_id' => '2',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'H359',           
            'key_condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N134',           
            'key_condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Y239',           
            'key_condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'B356',           
            'key_condition_id' => '1',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'A409',           
            'key_condition_id' => '1',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Ñ119',           
            'key_condition_id' => '2',
            'property_id' => 'SCL',
        ]);
    }
}
