<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(PropertiesTableSeeder::class);
        $this->call(PeopleTableSeeder::class);
        $this->call(AmphitryonsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ChecklistItemGroupsSeeder::class);
        $this->call(ChecklistsSeeder::class);
        $this->call(ChecklistItemsSeeder::class);
        $this->call(ChecklistRegistriesSeeder::class);
        $this->call(ChecklistEntriesSeeder::class);
        $this->call(PlacesTableSeeder::class);
        $this->call(KeysTableSeeder::class);
        $this->call(KeyLoansTableSeeder::class);


        Model::reguard();
    }
}
