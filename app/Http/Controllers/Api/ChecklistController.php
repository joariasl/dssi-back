<?php

namespace App\Http\Controllers\Api;

use App\Checklist;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Gate;

class ChecklistController extends Controller
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
            'property_id' => 'string|size:3',
        ]);

        if ($propertyId = request('property_id')){
           $checklist = Checklist::where('property_id', $propertyId)
                            ->with('checklistItems.checklistItemGroup')
                            ->first();
            return $checklist;
        }
        return Checklist::all();
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
        Checklist::create($request->all());
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
        return Checklist::with('checklistItems.checklistItemGroup')
                ->find($id);
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
        $checklist = Checklist::find($id);
        $checklist->update($request->all());
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
        Checklist::destroy($id);
    }
}
