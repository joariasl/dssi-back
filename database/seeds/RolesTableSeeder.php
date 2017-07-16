<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Checklist Read */
        $role = Role::create([
            'name'        => 'access-control.checklist-registry.read',
            'description' => 'Módulo Control de Acceso | Registro de Checklist [lectura]'
        ]);
        $role->permissions()->attach(Permission::where('name', 'access-control')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist.read')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist-registry.read')->first()->id);

        /* Checklist Write */
        $role = Role::create([
            'name'        => 'access-control.checklist-registry.write',
            'description' => 'Módulo Control de Acceso | Registro de Checklist [escritura]'
        ]);
        $role->permissions()->attach(Permission::where('name', 'access-control')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist.read')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist-registry.read')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist-registry.write')->first()->id);

        /* Checklist Admin */
        $role = Role::create([
            'name'        => 'access-control.checklist.admin',
            'description' => 'Módulo Control de Acceso'
        ]);
        $role->permissions()->attach(Permission::where('name', 'access-control')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist.read')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist.write')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist-registry.read')->first()->id);
        $role->permissions()->attach(Permission::where('name', 'access-control.checklist-registry.write')->first()->id);
    }
}
