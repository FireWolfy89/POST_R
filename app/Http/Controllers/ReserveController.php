<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReserveResource;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReserveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation = Reserve::all();

        //return ReserveResource::collection($reservation);

        return response()->json(ReserveResource::collection($reservation), Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reservation = Reserve::create($request->only([
            'name', 'phone_number', 'name_of_game', 'due_date', 'rent_date'
        ]));

        return new ReserveResource($reservation);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserve = Reserve::find($id);

        if($reserve){
            return new ReserveResource($reserve);
        }
        else{
            abort(404, "Nem található az objektum.");
        }

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reserve = Reserve::find($id);
        $reserve->update($request->only([
            'name', 'phone_number', 'name_of_game',
            'due_date', 'rent_date'
        ]));

        return new ReserveResource($reserve);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reserve  $reserve
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserve = Reserve::find($id);
        $reserve->delete();

        return response()->json(null,Response::HTTP_NO_CONTENT);
    }
}
