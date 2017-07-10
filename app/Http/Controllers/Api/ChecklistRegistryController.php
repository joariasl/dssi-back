<?php

namespace App\Http\Controllers\Api;

use App\Checklist;
use App\ChecklistRegistry;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;

class ChecklistRegistryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
            foreach($search as $key => $value) {
                $checklistRegistriesQuery = $checklistRegistriesQuery
                    ->where("$key", 'LIKE', "%$value%");
            }
        }

        $checklistRegistriesQuery = $checklistRegistriesQuery->with('checklistEntries.checklistItem');
        $checklistRegistriesQuery = $checklistRegistriesQuery->orderBy('date', 'desc');

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
