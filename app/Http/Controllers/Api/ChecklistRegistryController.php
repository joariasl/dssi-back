<?php

namespace App\Http\Controllers\Api;

use App\Checklist;
use App\ChecklistRegistry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;
use JWTAuth;
use Maatwebsite\Excel\Facades\Excel;

class ChecklistRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('access-control.checklist-registry.read')){
            abort(403);
        }
        /* TODO - Aplicar filtro de checklistId según cheklists pertenecientes a la propiedad usuario, cuando ya se haya identificado. */
        // Query configuration
        $checklistRegistriesQuery = ChecklistRegistry::query();
        if($checklistId = request('checklist_id')){
            $checklistRegistriesQuery = $checklistRegistriesQuery
                ->where('checklist_id', $checklistId);
        } elseif ($propertyId = request('property_id')){
            $checklistRegistriesQuery = $checklistRegistriesQuery->whereHas('checklist', function ($query) use ($propertyId) {
                $query->where('property_id', $propertyId);
            });
        }

        // Search
        if($search = json_decode(request('search'), true)){
            if(!empty($search['id'])){
                $checklistRegistriesQuery = $checklistRegistriesQuery
                    ->where('id', 'LIKE', '%'.$search['id'].'%');
            }
        }

        // Sort
        if($sort = json_decode(request('sort'), false)){
            $field = !empty($sort->field)?$sort->field:'date';
            $direction = !empty($sort->direction)?$sort->direction:'asc';
            $checklistRegistriesQuery = $checklistRegistriesQuery->orderBy($field, $direction, true);
        } else {
            $checklistRegistriesQuery = $checklistRegistriesQuery->orderBy('date', 'desc');
        }

        $checklistRegistriesQuery = $checklistRegistriesQuery->with('checklistEntries.checklistItem');

        // Get data
        if (request('page')){
            $checklistRegistries = $checklistRegistriesQuery->paginate();
        } else {
            $checklistRegistries = $checklistRegistriesQuery->get();
        }
        return $checklistRegistries;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('access-control.checklist-registry.write')){
            abort(403);
        }
        $this->validate($request, [
            'checklist_id'         => 'integer',
            'property_id'          => 'string|size:3',
            'credential_avaliable' => 'required|integer',
            'credential_delivered' => 'required|integer',
            'date'                 => 'required|date',
            'turn'                 => 'required|integer'
        ]);

        $user = JWTAuth::parseToken()->toUser();
        if($checklistId = request('checklist_id')){
            $checklist = Checklist::find($checklistId);
        }
        elseif ($propertyId = request('property_id')){
            $checklist = Checklist::where('property_id', $propertyId)
                ->first();
        }
        //$checklist->checklistRegistries()->create(array_merge($request->all(),['user_id' => $user->id]));
        //ChecklistRegistry::create(array_merge($request->all(),['user_id' => $user->id, 'checklist_id' => $checklist->id]));
        //$checklistRegistry = new ChecklistRegistry(array_merge($request->all(),['user_id' => $user->id]));
        $checklistRegistry = new ChecklistRegistry($request->all());
        $checklistRegistry->checklist_id = $checklist->id;
        $checklistRegistry->user_id = $user->id;
        if($checklistRegistry->save()) {
            $checklistRegistry->checklistEntries()->createMany($request->all()['checklist_entries']);
        }
        return response()->make(null, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Gate::denies('access-control.checklist-registry.read')){
            abort(403);
        }
        $checklistRegistry = ChecklistRegistry::with('checklistEntries.checklistItem.checklistItemGroup')
                                ->find($id);
        if($checklistRegistry){
            return $checklistRegistry;
        }else{
            return response()->make(null, 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Gate::denies('access-control.checklist-registry.write')){
            abort(403);
        }
        abort(405);// Method Not Allowed
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('access-control.checklist-registry.write')){
            abort(403);
        }
        abort(405);// Method Not Allowed
    }

    /**
     * Return the index resource on Excel.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexExcel()
    {
        if (Gate::denies('access-control.checklist-registry.read')){
            abort(403);
        }

        // Query
        $checklistRegistriesQuery = ChecklistRegistry::query();
        if($checklistId = request('checklist_id')){
            $checklistRegistriesQuery = $checklistRegistriesQuery
                ->where('checklist_id', $checklistId);
        } elseif ($propertyId = request('property_id')){
            $checklistRegistriesQuery = $checklistRegistriesQuery->whereHas('checklist', function ($query) use ($propertyId) {
                $query->where('property_id', $propertyId);
            });
        }

        // Sort
        $checklistRegistriesQuery = $checklistRegistriesQuery->orderBy('date', 'desc');

        $checklistRegistriesQuery = $checklistRegistriesQuery->with('checklistEntries.checklistItem');

        // Get data
        $checklistRegistries = $checklistRegistriesQuery->get();

        Excel::create('Checklist', function($excel) use ($checklistRegistries) {

            $excel->sheet('Excel sheet', function($sheet) use ($checklistRegistries) {

                $sheet->appendRow(array(
                    'Folio', 'Fecha', 'Turno', 'Grupo', 'Item', 'Estado', 'Observaciones'
                ));
                foreach ($checklistRegistries as $checklistRegistry){
                    foreach ($checklistRegistry->checklistEntries as $checklistEntry){
                        $checklistItem = $checklistEntry->checklistItem;
                        $checklistItemGroup = $checklistItem->checklistItemGroup;
                        $sheet->appendRow(array(
                            $checklistRegistry->id, $checklistRegistry->date, $checklistRegistry->turn, $checklistItemGroup->name, $checklistItem->name, $checklistItem->status===1?'SI':'NO', $checklistEntry->observations
                        ));
                    }
                }

            });

        })->export('xlsx');
    }

    /**
     * Return the index resource on Excel.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showExcel($id)
    {
        if (Gate::denies('access-control.checklist-registry.read')){
            abort(403);
        }
        $checklistRegistry = ChecklistRegistry::with('checklistEntries.checklistItem.checklistItemGroup')
            ->find($id);;
        Excel::create('Checklist', function($excel) use ($checklistRegistry) {

            $excel->sheet('Excel sheet', function($sheet) use ($checklistRegistry) {

                $sheet->appendRow(array(
                    'Folio', $checklistRegistry->id
                ));
                $sheet->appendRow(array(
                    'Fecha', $checklistRegistry->date, null, 'Turno', $checklistRegistry->turn
                ));
                $sheet->appendRow(array(
                    'Grupo', 'Item', 'Estado', 'Observaciones'
                ));
                foreach ($checklistRegistry->checklistEntries as $checklistEntry){
                    $checklistItem = $checklistEntry->checklistItem;
                    $checklistItemGroup = $checklistItem->checklistItemGroup;
                    $sheet->appendRow(array(
                        $checklistItemGroup->name, $checklistItem->name, $checklistItem->status===1?'SI':'NO', $checklistEntry->observations
                    ));
                }

            });

        })->export('xlsx');
    }
}
