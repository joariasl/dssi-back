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
            'admission_date' => '2011-01-11',
            'retirement_date' => '2021-02-20',
            'area_id' => '1',
            'position_id' => '1',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'rut' => '17946099',
            'username' => 'anovoa',
            'email' => 'alex@mail.com',
            'admission_date' => '2012-02-12',
            'retirement_date' => '2023-03-30',
            'area_id' => '2',
            'position_id' => '2',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'rut' => '1234567',
            'username' => 'dortiz',
            'email' => 'diana@mail.com',
            'admission_date' => '2013-03-13',
            'retirement_date' => '2024-03-30',
            'area_id' => '3',
            'position_id' => '3',
        ]);
    }
}
