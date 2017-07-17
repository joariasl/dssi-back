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

        // Sort
        $keyConditionsQuery = $keyConditionsQuery->orderBy('id', 'asc', true);

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
        abort(405);// Method Not Allowed
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        abort(405);// Method Not Allowed
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
        abort(405);// Method Not Allowed
    }
}
