<?php

namespace App\Http\Controllers\Api;

use App\KeyLoan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class KeyLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if($propertyId = request('property_id')){
            $keyLoans = KeyLoan::with('key')
                            ->with('amphitryonDelivery')
                            ->with('amphitryonReturn')
                            ->get();
            return $keyLoans;
        }

        return KeyLoan::all();
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
        $this->validate($request, [
            'key_id'                => 'required|integer',
            'property_id'           => 'required|string|size:3',
            'delivery_user_id'      => 'required|integer',
            'delivery_amphitryon_id'=> 'required|integer',
            'return_user_id'        => 'integer',
            'return_amphitryon_id'  => 'integer',
            'date'                  => 'required|date',
            'return_condition'      => 'string|size:100',
            'observations'          => 'string|size:255'
        ]);

        KeyLoan::create($request->all());
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
