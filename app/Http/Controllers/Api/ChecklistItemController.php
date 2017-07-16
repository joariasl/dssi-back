<?php

namespace App\Http\Controllers\Api;

use App\ChecklistItem;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;

class ChecklistItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::denies('access-control.checklist.read')){
            abort(403);
        }
        $request = request();
        $this->validate($request, [
            'checklist_id' => 'integer',
            'property_id' => 'string|size:3',
            'without_disabled' => 'boolean'
        ]);

        /* TODO - Aplicar filtro de checklistId según cheklists pertenecientes a la propiedad usuario, cuando ya se haya identificado. */
        $includeDisabled = request('without_disabled', false);
        if($checklistId = request('checklist_id')){
            $checklistItemsQuery = ChecklistItem::where('checklist_id', $checklistId)
                ->with('checklistItemGroup');
            if($includeDisabled){
                $checklistItemsQuery = $checklistItemsQuery->where('status', 1);
            }
            $checklistItems = $checklistItemsQuery->get();
            return $checklistItems;
        } elseif ($propertyId = request('property_id')){
            $checklistItemsQuery = ChecklistItem::whereHas('checklist', function ($query) use ($propertyId) {
                                    $query->where('property_id', $propertyId);
                                })
                                    ->with('checklistItemGroup');
            if($includeDisabled){
                $checklistItemsQuery = $checklistItemsQuery->where('status', 1);
            }
            $checklistItems = $checklistItemsQuery->get();
            return $checklistItems;
        }
        return ChecklistItem::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('access-control.checklist.write')){
            abort(403);
        }
        $request = request();
        $this->validate($request, [
            'checklist_id'            => 'required|integer',
            'checklist_item_group_id' => 'required|integer',
            'name'                    => 'required|string',
            'status'                  => 'required|boolean',
        ]);

        ChecklistItem::create($request->all());
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
        if (Gate::denies('access-control.checklist.read')){
            abort(403);
        }
        return ChecklistItem::find($id);
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
        if (Gate::denies('access-control.checklist.write')){
            abort(403);
        }
        $this->validate($request, [
            'id'     => 'integer',
            'name'   => 'string',
            'status' => 'boolean',
        ]);

        $checklistItem = ChecklistItem::find($id);
        $checklistItem->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Gate::denies('access-control.checklist.write')){
            abort(403);
        }
        abort(405);// Method Not Allowed
    }
}
