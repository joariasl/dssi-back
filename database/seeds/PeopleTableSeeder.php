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
            'name' => 'Gabriel',
            'lastname' => 'Salazar',
        ]);
        DB::table($this->table)->insert([
            'rut' => '17946099',
            'dv' => '8',
            'name' => 'Maria',
            'lastname' => 'Novoa',
        ]);
        DB::table($this->table)->insert([
            'rut' => '1234567',
            'dv' => '8',
            'name' => 'Fabian',
            'lastname' => 'Barrientos',
        ]);
        factory(App\Person::class, 10)->create();
    }
}