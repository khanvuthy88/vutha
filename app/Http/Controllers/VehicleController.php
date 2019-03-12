<?php

namespace App\Http\Controllers;

use App\Vehicle;
use App\Location;
use App\User;
use App\Repair;
use App\Fuel;
use App\Trip;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicle.index',compact('vehicles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vehicle $vehicle)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        $usersArray = array_pluck(User::all(),'name','id');
        $checked = '';
        if ($vehicle->active==1) {
            $checked = 'checked';
        }
        return view('admin.vehicle._form',compact('vehicle','locationsArray','checked','usersArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vehicle = new Vehicle();
        $vehicle->make = $request['make'];
        $vehicle->model = $request['model'];
        $vehicle->version = $request['version'];
        $vehicle->plat_number = $request['plat_number'];
        $vehicle->registration_date = $request['registration_date'];
        $vehicle->engine_number = $request['engine_number'];
        $vehicle->color = $request['color'];
        $vehicle->vehicle_type = $request['vehicle_type'];
        $vehicle->department = $request['department'];
        $vehicle->description = $request['description'];
        $vehicle->active = Input::has('active') ? True : False;
        $vehicle->save();
        $vehicle->Location()->associate($request['location_id']);
        $vehicle->save();
        $vehicle->User()->associate($request['user_id']);
        $vehicle->save();
        $vehicles = Vehicle::all();
        return redirect()->route('admin.vehicle.index',compact('vehicles'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(Vehicle $vehicle)
    {
        $repair_history = Repair::where('vehicle_id',$vehicle->id)->get();
        $fuels = Fuel::where('vehicle_id',$vehicle->id)->get();
        $trips = Trip::where('vehicle_id',$vehicle->id)->get();
        return view('admin.vehicle.single',compact('vehicle','repair_history','fuels','trips'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        $usersArray = array_pluck(User::all(),'name','id');
        $checked = '';
        if ($vehicle->active==1) {
            $checked = 'checked';
        }
        return view('admin.vehicle._form',compact('vehicle','locationsArray','checked','usersArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->make = $request['make'];
        $vehicle->model = $request['model'];
        $vehicle->version = $request['version'];
        $vehicle->plat_number = $request['plat_number'];
        $vehicle->registration_date = $request['registration_date'];
        $vehicle->engine_number = $request['engine_number'];
        $vehicle->color = $request['color'];
        $vehicle->vehicle_type = $request['vehicle_type'];
        $vehicle->department = $request['department'];
        $vehicle->description = $request['description'];
        $vehicle->active = Input::has('active') ? true : false;
        $vehicle->save();
        $vehicle->Location()->associate($request['location_id']);
        $vehicle->save();
        $vehicle->User()->associate($request['user_id']);
        $vehicle->save();
        $vehicles = Vehicle::all();
        return redirect()->route('admin.vehicle.index',compact('vehicles'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        return view('admin.vehicle._confirm_action',compact('vehicle'));
    }

    public function Confirm_Destroy(Vehicle $vehicle)
    {
        return $vehicle;
    }
}
