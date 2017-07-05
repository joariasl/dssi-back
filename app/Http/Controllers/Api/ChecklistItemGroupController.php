<?php

namespace App\Http\Controllers\api;

use App\ChecklistItem;
use App\ChecklistItemGroup;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChecklistItemGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        if($checklistId = request('checklist_id')){
//            $checklistItemGroups = ChecklistItemGroup::whereHas('checklistItems', function ($query) use ($checklistId) {
//                                        $query->where('checklist_id', $checklistId);
//                                    })->get();
//            return $checklistItemGroups;
//        } elseif ($propertyId = request('property_id')){
//            $checklistItemGroups = ChecklistItemGroup::whereHas('checklistItems', function ($query) use ($propertyId) {
//                                        $query->whereHas('checklist', function ($query) use ($propertyId) {
//                                            $query->where('property_id', $propertyId);
//                                        });
//                                    })
//                                    ->get();
//            return $checklistItemGroups;
//        }
        return ChecklistItemGroup::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ChecklistItemGroup::create($request->all());
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
        $checklistItemGroup = ChecklistItemGroup::find($id);
        if($checklistItemGroup){
            return $checklistItemGroup;
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
        $this->validate($request, [
            'id'     => 'integer',
            'name'   => 'string',
        ]);

        $checklistItemGroup = ChecklistItemGroup::find($id);
        $checklistItemGroup->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ChecklistItemGroup::destroy($id);
        return response()->make(null, 204);
    }
}
