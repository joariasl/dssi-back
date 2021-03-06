<?php

use Illuminate\Database\Seeder;

class PeopleTableSeeder extends Seeder
{
    protected $table = 'people';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'rut' => '17982585',
            'dv' => '1',
            'name' => 'John',
            'lastname' => 'Doe',
            'birthdate' => '1991-01-01',
            'gender' => 'M',
        ]);
        DB::table($this->table)->insert([
            'rut' => '17946099',
            'dv' => '8',
            'name' => 'Alex',
            'lastname' => 'Novoa',
            'birthdate' => '1992-02-02',
            'gender' => 'M',
        ]);
        DB::table($this->table)->insert([
            'rut' => '1234567',
            'dv' => '8',
            'name' => 'Diana',
            'lastname' => 'Ortiz',
            'birthdate' => '1993-03-03',
            'gender' => 'F',
        ]);
    }
}
