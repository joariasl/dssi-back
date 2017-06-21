<?php

use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    protected $table = 'properties';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => 'TCO',
            'name' => 'Temuco',
        ]);
        DB::table($this->table)->insert([
            'id' => 'SCL',
            'name' => 'Santiago',
        ]);
        factory(App\Property::class, 3)->create();
    }
}
