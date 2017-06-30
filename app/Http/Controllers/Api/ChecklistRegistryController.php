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
        if($checklistId = request('checklist_id')){
            $checklistRegistries = ChecklistRegistry::query('checklist_id', $checklistId)
                                    ->with('checklistEntries')
                                    ->get();
            return $checklistRegistries;
        } elseif ($propertyId = request('property_id')){
            $checklistRegistries = ChecklistRegistry::whereHas('checklist', function ($query) use ($propertyId) {
                                        $query->where('property_id', $propertyId);
                                    })
                                    ->with('checklistEntries')
                                    ->get();
            return $checklistRegistries;
        }
        return ChecklistRegistry::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        $checklistRegistry = ChecklistRegistry::with('checklistEntries')
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
