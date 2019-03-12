<?php

namespace App\Http\Controllers;

use App\Repair;
use App\Vendor;
use App\Location;
use App\User;
use App\Vehicle;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Image as InventionImage;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repairs = Repair::all();
        return view('admin.repair.index',compact('repairs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Repair $repair)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        $vendorsArray = array_pluck(Vendor::all(),'name','id');
        $usersArray = array_pluck(User::all(),'name','id');
        $vehiclesArray = array_pluck(Vehicle::all(),'make','id');
        return view('admin.repair._form',compact('repair','locationsArray','vendorsArray','usersArray','vehiclesArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $repair = new Repair();
        $repair->description= $request['description'];
        $repair->repair_type = $request['repair_type'];
        $repair->invoice_date = $request['invoice_date'];
        $repair->invoice_due_date = $request['invoice_due_date'];
        $repair->invoice_number = $request['invoice_number'];
        $repair->payment_type = $request['payment_type'];
        $repair->document_number = $request['document_number'];
        $repair->save();
        $repair->Vendor()->associate($request['vendor_id']);
        $repair->save();
        $repair->Vehicle()->associate($request['vehicle']);
        $repair->save();

        // if ($request['attachment']) {
        //     $time = Carbon::now();
        //     $ext=$request['attachment']->guessClientExtension();
        //     $img = InventionImage::make($request['attachment']->getRealPath());
        //     $originalPath = public_path().'/images/repair/';
        //     $imageName=$originalPath.str_random(5).date_format($time,'d').date_format($time,'m').'_repair_'.$repair->id.".".$ext;           
        //     $img->save($imageName);
        // }


        $repairs = Repair::all();
        return redirect()->route('admin.repair.index',compact('repairs'));
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function show(Repair $repair)
    {
        return $repair;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function edit(Repair $repair)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        $vendorsArray = array_pluck(Vendor::all(),'name','id');
        $usersArray = array_pluck(User::all(),'name','id');
        $vehiclesArray = array_pluck(Vehicle::all(),'make','id');
        return view('admin.repair._form',compact('repair','locationsArray','vendorsArray','usersArray','vehiclesArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repair $repair)
    {
        $repair->description= $request['description'];
        $repair->repair_type = $request['repair_type'];
        $repair->invoice_date = $request['invoice_date'];
        $repair->invoice_due_date = $request['invoice_due_date'];
        $repair->invoice_number = $request['invoice_number'];
        $repair->payment_type = $request['payment_type'];
        $repair->document_number = $request['document_number'];
        $repair->save();
        $repair->Vendor()->associate($request['vendor_id']);
        $repair->save();
        $repair->Vehicle()->associate($request['vehicle']);
        $repair->save();
        // if ($request['attachment']) {
        //     $time = Carbon::now();
        //     $ext=$request['attachment']->guessClientExtension();
        //     $img = InventionImage::make($request['attachment']->getRealPath());
        //     $originalPath = public_path().'/images/repair/';
        //     $imageName=$originalPath.str_random(5).date_format($time,'d').date_format($time,'m').'_repair_'.$repair->id.".".$ext;
        //     $img->save($imageName);
        //     $repair->attachment= $imageName;
        //     $repair->save();
        // }
        $repairs = Repair::all();
        return redirect()->route('admin.repair.index',compact('repairs'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repair  $repair
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repair $repair)
    {
        //
    }
}
