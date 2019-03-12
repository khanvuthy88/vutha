<?php

namespace App\Http\Controllers;

use App\Trip;
use App\Vehicle;
use Illuminate\Http\Request;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trips = Trip::all();
        return view('admin.trip.index',compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Trip $trip)
    {
        $vehiclesArray = array_pluck(Vehicle::all(),'make','id');
        return view('admin.trip._form',compact('vehiclesArray','trip'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trip = new Trip();
        $trip->description = $request['description'];
        $trip->departure_locataion = $request['departure_locataion'];
        $trip->to_location = $request['to_location'];
        $trip->trip_distance = $request['trip_distance'];
        $trip->trip_start_date = $request['trip_start_date'];
        $trip->trip_end_date = $request['trip_end_date'];
        $trip->save();
        $trip->Vehicle()->associate($request['vehicle_id']);
        $trip->save();
        $trips = Trip::all();
        return redirect()->route('admin.trip.index',compact('trips'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function show(Trip $trip)
    {
        return $trip;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function edit(Trip $trip)
    {
        $vehiclesArray = array_pluck(Vehicle::all(),'make','id');
        return view('admin.trip._form',compact('vehiclesArray','trip'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trip $trip)
    {
        $trip->description = $request['description'];
        $trip->departure_locataion = $request['departure_locataion'];
        $trip->to_location = $request['to_location'];
        $trip->trip_distance = $request['trip_distance'];
        $trip->trip_start_date = $request['trip_start_date'];
        $trip->trip_end_date = $request['trip_end_date'];
        $trip->save();
        $trip->Vehicle()->associate($request['vehicle_id']);
        $trip->save();
        $trips = Trip::all();
        return redirect()->route('admin.trip.index',compact('trips'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trip  $trip
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trip $trip)
    {
        return view('admin.trip._confirm_action',compact('trip'));
    }

    public function Confirm_Destroy(Trip $trip)
    {
        return $trip;
    }
}
