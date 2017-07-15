<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::find(1);
        $user->roles()->attach(Role::where('name', 'access-control.checklist-registry.read')->first()->id);
        $user->roles()->attach(Role::where('name', 'access-control.checklist-registry.write')->first()->id);
        $user->roles()->attach(Role::where('name', 'access-control.checklist.admin')->first()->id);

        $user = User::find(2);
        $user->roles()->attach(Role::where('name', 'access-control.checklist-registry.read')->first()->id);
        $user->roles()->attach(Role::where('name', 'access-control.checklist-registry.write')->first()->id);
    }
}
