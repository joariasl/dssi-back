<?php

namespace App\Http\Controllers\Api;

use App\Key;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $keysQuery = Key::query();
        if($propertyId = request('property_id')){
            $keysQuery = $keysQuery->where('property_id', $propertyId);
        }

        // Search
        if($search = json_decode(request('search'), true)){
            if(!empty($search['code'])){
                $keyCode = $search['code'];
                $keysQuery = $keysQuery->where('code', 'LIKE', '%'.$keyCode.'%');
            }
            if(!empty($search['key_condition_id'])){
                $keyConditionId = $search['key_condition_id'];
                $keysQuery = $keysQuery->where('key_condition_id', $keyConditionId);
            }
        }

        // Sort
        if($sort = json_decode(request('sort'), false)){
            $field = !empty($sort->field)?$sort->field:'code';
            $direction = !empty($sort->direction)?$sort->direction:'asc';
            $keysQuery = $keysQuery->orderBy($field, $direction, true);
        }

        // Default
        $keysQuery = $keysQuery
            ->with('keyCondition');

        // Get data
        if (request('page')){
            $keys = $keysQuery->paginate();
        } else {
            $keys = $keysQuery->get();
        }
        return $keys;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Key::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Key::find($id);
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
        $key = Key::find($id);
        $key->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Key::destroy($id);
    }
}
