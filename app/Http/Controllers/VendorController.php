<?php

namespace App\Http\Controllers;

use App\Vendor;
use App\Location;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = Vendor::all();
        return view('admin.vendor.index',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Vendor $vendor)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        $checked = '';
        if ($vendor->active == 1) {
            $checked = 'checked';
        }
        return view('admin.vendor._form',compact('vendor','locationsArray','checked'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $vendor = new Vendor();
        $vendor->name = $request['name'];
        $vendor->code = $request['code'];
        $vendor->tel = $request['tel'];
        $vendor->phone = $request['phone'];
        $vendor->address = $request['address'];
        $vendor->post_code = $request['post_code'];
        $vendor->email = $request['email'];
        $vendor->active = Input::has('active') ? true : false;
        $vendor->description = $request['description'];
        $vendor->save();
        $vendor->Location()->associate($request['location_id']);
        $vendor->save();

        $vendors = Vendor::all();
        return redirect()->route('admin.vendor.index',compact('vnedors'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function show(Vendor $vendor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function edit(Vendor $vendor)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        $checked = '';
        if ($vendor->active) {
            $checked = 'checked';
        }
        return view('admin.vendor._form',compact('vendor','locationsArray','checked'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vendor $vendor)
    {
        $vendor->name = $request['name'];
        $vendor->code = $request['code'];
        $vendor->tel = $request['tel'];
        $vendor->phone = $request['phone'];
        $vendor->address = $request['address'];
        $vendor->post_code = $request['post_code'];
        $vendor->email = $request['email'];
        $vendor->active = Input::has('active') ? true : false;
        $vendor->description = $request['description'];
        $vendor->save();
        $vendor->Location()->associate($request['location_id']);
        $vendor->save();

        $vendors = Vendor::all();
        return redirect()->route('admin.vendor.index',compact('vnedors'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vendor $vendor)
    {
        return view('admin.vendor._confirm_action',compact('vendor'));
    }

    public function Confirm_Destroy(Vendor $vendor)
    {
        return $vendor;
    }
}
