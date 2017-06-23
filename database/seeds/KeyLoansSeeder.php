<?php

use Illuminate\Database\Seeder;

class KeyLoansSeeder extends Seeder
{
    protected $table = 'key_loans';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'key_id' => '1',
            'delivery_rut' => '17982585',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 1',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'key_id' => '2',
            'delivery_rut' => '17946099',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 1',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'key_id' => '3',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 1',
        ]);

    }
}
