<?php

use App\Module;
use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $module = Module::create([
            'parent_module_id' => null,
            'name' => 'Dashboard',
            'state' => '',
            'icon' => 'dashboard'
        ]);

        $module = Module::create([
            'parent_module_id' => null,
            'name' => 'Control de Acceso',
            'state' => null,
            'icon' => 'unlock-alt'
        ]);
        $module->childModules()->save(new Module([
            'name' => 'Checklist',
            'state' => 'access-control.checklist.checklist-registries',
            'icon' => null
        ]));
        $module->childModules()->save(new Module([
            'name' => 'Visitas',
            'state' => 'access-control.visits.view',
        ]));
        $module->childModules()->save(new Module([
            'name' => 'Llaves',
            'state' => 'access-control.key-loans.key-loans',
        ]));



        $module = Module::create([
            'parent_module_id' => null,
            'name' => 'Sistema',
            'state' => null,
            'icon' => 'gears'
        ]);
        $module->childModules()->save(new Module([
            'name' => 'Usuarios',
            'state' => '',
            'icon' => null
        ]));
    }
}
