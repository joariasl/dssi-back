<?php

use Illuminate\Database\Seeder;

class KeysSeeder extends Seeder
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
            'property_id' => 'SCL',
        ]);
    }
}
