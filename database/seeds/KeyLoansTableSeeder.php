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
            'delivery_datetime' => '2017-07-06 02:18:50',
            'return_datetime' => '2017-07-06 03:18:50',
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '1',
            'return_user_id' => '1',
            'return_amphitryon_id' => '1',
            'observations' => 'Observación 1',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'key_id' => '2',
            'delivery_datetime' => '2017-06-19',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '2',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 2',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'key_id' => '3',
            'delivery_datetime' => '2017-07-06 12:33:00',
            'return_datetime' => '2017-07-06 15:33:00',
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '3',
            'return_user_id' => '1',
            'return_amphitryon_id' => '1',
            'observations' => 'Observación 3',
        ]);
        DB::table($this->table)->insert([
            'id' => '4',
            'key_id' => '4',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '1',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 4',
        ]);
        DB::table($this->table)->insert([
            'id' => '5',
            'key_id' => '5',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '2',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 5',
        ]);
        DB::table($this->table)->insert([
            'id' => '6',
            'key_id' => '6',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '3',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 6',
        ]);
        DB::table($this->table)->insert([
            'id' => '7',
            'key_id' => '7',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '1',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 7',
        ]);
        DB::table($this->table)->insert([
            'id' => '8',
            'key_id' => '8',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '2',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 8',
        ]);
        DB::table($this->table)->insert([
            'id' => '9',
            'key_id' => '9',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '3',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 9',
        ]);
        DB::table($this->table)->insert([
            'id' => '10',
            'key_id' => '10',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '1',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 10',
        ]);
        DB::table($this->table)->insert([
            'id' => '11',
            'key_id' => '11',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '2',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 11',
        ]);
        DB::table($this->table)->insert([
            'id' => '12',
            'key_id' => '12',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '3',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 12',
        ]);
        DB::table($this->table)->insert([
            'id' => '13',
            'key_id' => '13',
            'delivery_datetime' => '2017-06-20',
            'return_datetime' => null,
            'delivery_user_id' => '1',
            'delivery_amphitryon_id' => '1',
            'return_user_id' => null,
            'return_amphitryon_id' => null,
            'observations' => 'Observación 13',
        ]);
        // Repetidos
        for ($i = 0; $i < 25; $i++) {
            DB::table($this->table)->insert([
                'key_id' => '11',
                'delivery_datetime' => '2017-06-20',
                'return_datetime' => null,
                'delivery_user_id' => '1',
                'delivery_amphitryon_id' => '2',
                'return_user_id' => null,
                'return_amphitryon_id' => null,
                'observations' => null,
            ]);
        }
    }
}
