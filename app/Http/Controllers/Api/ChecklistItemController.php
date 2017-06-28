<?php

namespace App\Http\Controllers\Api;

use App\ChecklistItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ChecklistItemController extends Controller
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
            $checklistRegistries = ChecklistItem::query('checklist_id', $checklistId)
                                    ->with('checklistItemGroup')
                                    ->get();
            return $checklistRegistries;
        } elseif ($propertyId = request('property_id')){
            $checklistRegistries = ChecklistItem::whereHas('checklist', function ($query) use ($propertyId) {
                                        $query->where('property_id', $propertyId);
                                    })
                                    ->with('checklistItemGroup')
                                    ->get();
            return $checklistRegistries;
        }
        return ChecklistItem::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return ChecklistItem::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
