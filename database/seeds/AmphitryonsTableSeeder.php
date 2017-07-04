<?php

use Illuminate\Database\Seeder;

class AmphitryonsTableSeeder extends Seeder
{
    protected $table = 'amphitryons';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'rut' => '17982585',
            'username' => 'jdoe',
            'email' => 'john@mail.com',
            'admission_date' => '10-01-2011',
            'retirement_date' => '10-01-2021',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'rut' => '17946099',
            'username' => 'anovoa',
            'email' => 'alex@mail.com',
            'admission_date' => '20-02-2012',
            'retirement_date' => '20-02-2022',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'rut' => '1234567',
            'username' => 'dortiz',
            'email' => 'diana@mail.com',
            'admission_date' => '30-03-2013',
            'retirement_date' => '30-03-2023',
        ]);
    }
}
