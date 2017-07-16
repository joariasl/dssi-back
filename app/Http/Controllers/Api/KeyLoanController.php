<?php

namespace App\Http\Controllers\Api;

use App\KeyLoan;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use JWTAuth;

class KeyLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keyLoansQuery = KeyLoan::query();
        if($propertyId = request('property_id')){
            $keyLoansQuery = $keyLoansQuery->whereHas('key', function ($query) use ($propertyId) {
                $query->where('property_id', $propertyId);
            });
        }

        // Search
        if($search = json_decode(request('search'), false)){
            if(!empty($search->id)){
                $keyLoansQuery = $keyLoansQuery
                    ->where('id', 'LIKE', '%'.$search->id.'%');
            }
            if(!empty($search->key->code)){
                $keyLoansQuery = $keyLoansQuery
                    ->whereHas('key', function ($query) use ($search) {
                        $query->where('code', 'LIKE', '%'.$search->key->code.'%');
                    });
            }
        }

        // Sort
        if($sort = json_decode(request('sort'), false)){
            $field = !empty($sort->field)?$sort->field:'id';
            $direction = !empty($sort->direction)?$sort->direction:'asc';
            $keyLoansQuery = $keyLoansQuery->orderBy($field, $direction, true);
        }

        // Default
        $keyLoansQuery = $keyLoansQuery
            ->with('key')
            ->with('amphitryonDelivery.person')
            ->with('amphitryonReturn.person');

        // Get data
        if (request('page')){
            $keyLoans = $keyLoansQuery->paginate();
        } else {
            $keyLoans = $keyLoansQuery->get();
        }
        return $keyLoans;
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
            'delivery_user_id'      => 'integer',
            'delivery_amphitryon_id'=> 'required|integer',
            'return_user_id'        => 'integer',
            'return_amphitryon_id'  => 'integer',
            'delivery_datetime'     => 'required|date',
            'delivery_datetime'     => 'date',
            'observations'          => 'string|size:255'
        ]);

        $user = JWTAuth::parseToken()->toUser();

        $keyLoan = new KeyLoan($request->all());
        $keyLoan->delivery_user_id = $user->id;
        $keyLoan->save();
        return response()->make($keyLoan, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keyLoan = KeyLoan::with('key.keyCondition')
            ->with('amphitryonDelivery.person')
            ->with('amphitryonDelivery.area')
            ->find($id);
        if($keyLoan){
            return $keyLoan;
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
            'key_id'                => 'required|integer',
            'delivery_user_id'      => 'integer',
            'delivery_amphitryon_id'=> 'required|integer',
            'return_user_id'        => 'integer',
            'return_amphitryon_id'  => 'integer',
            'delivery_datetime'     => 'required|date',
            'delivery_datetime'     => 'date',
            'observations'          => 'string|size:255'
        ]);

        $keyLoan = KeyLoan::find($id);
        $keyLoan->update($request->all());
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
