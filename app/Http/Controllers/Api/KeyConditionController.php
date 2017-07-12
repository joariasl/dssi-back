<?php

namespace App\Http\Controllers\Api;

use App\KeyCondition;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KeyConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $keyConditionsQuery = KeyCondition::query();
        if ($propertyId = request('property_id')) {
            $keyConditionsQuery = $keyConditionsQuery->whereHas('keys', function ($query) use ($propertyId) {
                $query->where('property_id', $propertyId);
            });
        }

        // Sort
        if($sort = json_decode(request('sort'), false)){
            $field = !empty($sort->field)?$sort->field:'id';
            $direction = !empty($sort->direction)?$sort->direction:'asc';
            $keyConditionsQuery = $keyConditionsQuery->orderBy($field, $direction, true);
        }

        // Default

        // Get data
        $keyConditions = $keyConditionsQuery->get();
        return $keyConditions;
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
