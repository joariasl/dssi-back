<?php

use Illuminate\Database\Seeder;

class KeyLoansTableSeeder extends Seeder
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
            'date' => '2017-06-18',
            'delivery_rut' => '17982585',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 1',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'key_id' => '2',
            'date' => '2017-06-19',
            'delivery_rut' => '17946099',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 2',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'key_id' => '3',
            'date' => '2017-06-20',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 3',
        ]);
        DB::table($this->table)->insert([
            'id' => '4',
            'key_id' => '4',
            'date' => '2017-06-20',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'Quebrada',
            'observations' => 'Observación 4',
        ]);
        DB::table($this->table)->insert([
            'id' => '5',
            'key_id' => '5',
            'date' => '2017-06-20',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'Perdida',
            'observations' => 'Observación 5',
        ]);
        DB::table($this->table)->insert([
            'id' => '6',
            'key_id' => '6',
            'date' => '2017-06-20',
            'delivery_rut' => '17946099',
            'return_rut' => null,
            'return_condition' => 'Quebrada',
            'observations' => 'Observación 6',
        ]);
        DB::table($this->table)->insert([
            'id' => '7',
            'key_id' => '7',
            'date' => '2017-06-20',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'En reparación',
            'observations' => 'Observación 7',
        ]);
        DB::table($this->table)->insert([
            'id' => '8',
            'key_id' => '8',
            'date' => '2017-06-20',
            'delivery_rut' => '17946099',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 8',
        ]);
        DB::table($this->table)->insert([
            'id' => '9',
            'key_id' => '9',
            'date' => '2017-06-20',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 9',
        ]);
        DB::table($this->table)->insert([
            'id' => '10',
            'key_id' => '10',
            'date' => '2017-06-20',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'Perdida',
            'observations' => 'Observación 10',
        ]);
        DB::table($this->table)->insert([
            'id' => '11',
            'key_id' => '11',
            'date' => '2017-06-20',
            'delivery_rut' => '1234567',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 11',
        ]);
        DB::table($this->table)->insert([
            'id' => '12',
            'key_id' => '12',
            'date' => '2017-06-20',
            'delivery_rut' => '17982585',
            'return_rut' => null,
            'return_condition' => 'En reparación',
            'observations' => 'Observación 12',
        ]);
        DB::table($this->table)->insert([
            'id' => '13',
            'key_id' => '13',
            'date' => '2017-06-20',
            'delivery_rut' => '17982585',
            'return_rut' => null,
            'return_condition' => 'Operativa',
            'observations' => 'Observación 13',
        ]);
    }
}
