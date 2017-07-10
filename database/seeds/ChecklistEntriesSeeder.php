<?php

use Illuminate\Database\Seeder;

class ChecklistEntriesSeeder extends Seeder
{
    protected $table = 'checklist_entries';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // For checklist_registry_id = 1
        DB::table($this->table)->insert([
            'id' => '1',
            'checklist_registry_id' => '1',
            'checklist_item_id' => '1',
            'response' => '1',
            'observations' => 'Observación de equipo Radial.',
        ]);
        DB::table($this->table)->insert([
            'id' => '2',
            'checklist_registry_id' => '1',
            'checklist_item_id' => '2',
            'response' => '0',
            'observations' => 'Observación de Computador que no funciona.',
        ]);
        DB::table($this->table)->insert([
            'id' => '3',
            'checklist_registry_id' => '1',
            'checklist_item_id' => '3',
            'response' => '1',
            'observations' => 'Observación de retiro de basura que está retirada. Con éste # símbolo, de gato.',
        ]);
        // For checklist_registry_id = 2
        DB::table($this->table)->insert([
            'id' => '4',
            'checklist_registry_id' => '2',
            'checklist_item_id' => '1',
            'response' => '0',
            'observations' => 'Observación de equipo Radial que ahora no funciona.',
        ]);
        DB::table($this->table)->insert([
            'id' => '5',
            'checklist_registry_id' => '2',
            'checklist_item_id' => '2',
            'response' => '1',
            'observations' => 'Observación de Computador que ahora SÍ funciona.',
        ]);
        DB::table($this->table)->insert([
            'id' => '6',
            'checklist_registry_id' => '2',
            'checklist_item_id' => '3',
            'response' => '0',
            'observations' => 'Ahora no se ha retirado la basura.',
        ]);
        // For checklist_registry_id = 3
        DB::table($this->table)->insert([
            'checklist_registry_id' => '3',
            'checklist_item_id' => '1',
            'response' => '1',
            'observations' => null,
        ]);
        DB::table($this->table)->insert([
            'checklist_registry_id' => '3',
            'checklist_item_id' => '2',
            'response' => '1',
            'observations' => null,
        ]);
        DB::table($this->table)->insert([
            'checklist_registry_id' => '3',
            'checklist_item_id' => '3',
            'response' => '1',
            'observations' => null,
        ]);
        // For checklist_registry_id = 4
        DB::table($this->table)->insert([
            'checklist_registry_id' => '3',
            'checklist_item_id' => '4',
            'response' => '1',
            'observations' => 'One text.',
        ]);
    }
}
