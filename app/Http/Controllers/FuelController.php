<?php

namespace App\Http\Controllers;

use App\Fuel;
use App\Vendor;
use App\Vehicle;
use Illuminate\Http\Request;

class FuelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuels = Fuel::all();
        return view('admin.fuel.index',compact('fuels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Fuel $fuel)
    {
        $vendorsArray = array_pluck(Vendor::all(),'name','id');
        $vehiclesArray = array_pluck(Vehicle::all(),'make','id');
        return view('admin.fuel._form',compact('vendorsArray','vehiclesArray','fuel'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fuel = new Fuel();
        $fuel->quantity = $request['quantity'];
        $fuel->filling_date = $request['filling_date'];
        $fuel->price_per_lit = $request['price_per_lit'];
        $fuel->payment_date = $request['payment_date'];
        $fuel->note = $request['note'];
        $fuel->total_amount = $request['total_amount'];
        $fuel->fuel_type = $request['fuel_type'];
        $fuel->payment_type = $request['payment_type'];
        $fuel->save();
        $fuel->Vendor()->associate($request['vendor_id']);
        $fuel->save();
        $fuel->Vehicle()->associate($request['vehicle']);
        $fuel->save();
        $fuels = Fuel::all();
        return redirect()->route('admin.fuel.index',compact('fuels'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function show(Fuel $fuel)
    {
        return $fuel;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function edit(Fuel $fuel)
    {
        $vendorsArray = array_pluck(Vendor::all(),'name','id');
        $vehiclesArray = array_pluck(Vehicle::all(),'make','id');
        return view('admin.fuel._form',compact('vendorsArray','vehiclesArray','fuel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fuel $fuel)
    {
        $fuel->quantity = $request['quantity'];
        $fuel->filling_date = $request['filling_date'];
        $fuel->price_per_lit = $request['price_per_lit'];
        $fuel->payment_date = $request['payment_date'];
        $fuel->note = $request['note'];
        $fuel->total_amount = $request['total_amount'];
        $fuel->fuel_type = $request['fuel_type'];
        $fuel->payment_type = $request['payment_type'];
        $fuel->save();
        $fuel->Vendor()->associate($request['vendor_id']);
        $fuel->save();
        $fuel->Vehicle()->associate($request['vehicle']);
        $fuel->save();
        $fuels = Fuel::all();
        return redirect()->route('admin.fuel.index',compact('fuels'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fuel  $fuel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fuel $fuel)
    {
        return view('admin.fuel._confirm_action',compact('fuel'));
    }

    public function Confirm_Destroy(Fuel $fuel)
    {
        return $fuel;
    }
}
