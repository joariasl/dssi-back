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
            $keyLoans = KeyLoan::whereHas('key', function ($query) use ($propertyId) {
                                $query->where('property_id', $propertyId);
                            })
                            ->with('key')
                            ->with('amphitryonDelivery.person')
                            ->with('amphitryonReturn.person')
                            ->get();
            return $keyLoans;
        }

        return KeyLoan::all();
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
            'delivery_user_id'      => 'required|integer',
            'delivery_amphitryon_id'=> 'required|integer',
            'return_user_id'        => 'integer',
            'return_amphitryon_id'  => 'integer',
            'delivery_datetime'     => 'required|date',
            'delivery_datetime'     => 'date',
            'return_condition'      => 'string|size:100',
            'observations'          => 'string|size:255'
        ]);

        KeyLoan::create($request->all());
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
