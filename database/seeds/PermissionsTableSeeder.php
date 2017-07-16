<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* CONTROL DE ACCESO */
        Permission::create([
            'name'        => 'access-control',
            'description' => 'Módulo Control de Acceso'
        ]);
        /* Checklist */
        Permission::create([
            'name'        => 'access-control.checklist.read',
            'description' => 'Módulo Control de Acceso | Administración Checklist [lectura]'
        ]);
        Permission::create([
            'name'        => 'access-control.checklist.write',
            'description' => 'Módulo Control de Acceso | Administración Checklist [escritura]'
        ]);
        Permission::create([
            'name'        => 'access-control.checklist-registry.read',
            'description' => 'Módulo Control de Acceso | Registro de Checklist [lectura]'
        ]);
        Permission::create([
            'name'        => 'access-control.checklist-registry.write',
            'description' => 'Módulo Control de Acceso | Registro de Checklist [escritura]'
        ]);
    }
}
