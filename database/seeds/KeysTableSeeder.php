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
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'K456',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N789',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N729',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N589',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Q911',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'C734',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'H359',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'N134',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Y239',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'B356',
            'property_id' => 'TCO',
        ]);
        DB::table($this->table)->insert([
            'code' => 'A409',
            'property_id' => 'SCL',
        ]);
        DB::table($this->table)->insert([
            'code' => 'Ñ119',
            'property_id' => 'SCL',
        ]);
    }
}
