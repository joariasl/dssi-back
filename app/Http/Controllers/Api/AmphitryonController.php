<?php

namespace App\Http\Controllers\Api;

use App\Amphitryon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AmphitryonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amphitryonsQuery = Amphitryon::query();

        // Search
        if($search = json_decode(request('search'), true)){
            if(!empty($search['person_rut'])){
                $personRut = $search['person_rut'];
                $amphitryonsQuery = $amphitryonsQuery->where('person_rut', 'LIKE', '%'.$personRut.'%');
            }
        }

        // Default
        $amphitryonsQuery = $amphitryonsQuery
            ->with('person')
            ->with('area');

        // Get data
        if (request('page')){
            $amphitryons = $amphitryonsQuery->paginate();
        } else {
            $amphitryons = $amphitryonsQuery->get();
        }
        return $amphitryons;
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
