<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    protected $table = 'users';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->insert([
            'id' => '1',
            'username' => 'jdoe',
            'password' => bcrypt('secret'),
            'property_id' => 'TCO',
            'amphitryon_id' => '1',
        ]);
    }
}
