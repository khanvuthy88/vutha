<?php

namespace App\Http\Controllers;

use App\UserDetail;
use App\User;
use App\Location;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        return view('admin.user._form',compact('user','locationsArray'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userdetail = new UserDetail();
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = Hash::make($request['password']);
        $user->save();
        $userdetail->phone = $request['phone'];
        $userdetail->employment_number = $request['employment_number'];
        $userdetail->address = $request['address'];
        $userdetail->phone = $request['phone'];
        $userdetail->employment_number = $request['employment_number'];
        $userdetail->address = $request['address'];
        $userdetail->user_type = $request['user_type'];
        $userdetail->save();
        $userdetail->User()->associate($user);
        $userdetail->save();
        $userdetail->Location()->associate($request['location_id']);
        $userdetail->save();
        $users = User::all();
        return redirect()->route('admin.user.index',compact('users'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserDetail  $userDetail
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserDetail  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $locationsArray = array_pluck(Location::all(),'name','id');
        return view('admin.user._form',compact('user','locationsArray'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserDetail  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user,UserDetail $userdetail)
    {
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        $userdetail->phone = $request['phone'];
        $userdetail->employment_number = $request['employment_number'];
        $userdetail->address = $request['address'];
        $userdetail->phone = $request['phone'];
        $userdetail->employment_number = $request['employment_number'];
        $userdetail->address = $request['address'];
        $userdetail->user_type = $request['user_type'];
        $userdetail->save();
        $userdetail->User()->associate($user);
        $userdetail->save();
        $userdetail->Location()->associate($request['location_id']);
        $userdetail->save();
        $users = User::all();
        return redirect()->route('admin.user.index',compact('users'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserDetail  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        return view('admin.user._confirm_action',compact('user'));
    }


    public function Confirm_Destroy(User $user)
    {
        return $user;
    }
}
