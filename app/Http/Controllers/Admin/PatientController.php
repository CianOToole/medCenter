<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Auth;


class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        $roles =  UserRole::where('role_id', '3')->get();
        return view('admin.patients.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.patients.create', [
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:191',
            'address' => 'required|max:191',
            'role_id' => 'required',
            'phone' => 'required|max:191',
            'email' => 'required|max:191'
        ]);
        $user = new User;
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
        $user->roles()->attach(Role::where('id', $request->input('role_id'))->first());

        return redirect()->route('admin.patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $role =  UserRole::where('user_id', $id)->get();
        return view('admin.patients.show', [
            'user' => $user,
            'role' => $role
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles =  UserRole::all();
        $user = User::findOrFail($id);
        return view('admin.patients.edit', [
            'user' => $user,
            'roles' => $roles
        ]);
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
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|max:191',
            'address' => 'required|max:191',
            'role_id' => 'required',
            'phone' => 'required|max:191',
            'email' => 'required|max:191'
        ]);
        $role =  UserRole::where('user_id', $id)->get();
        $user =  User::findOrFail($id);
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
        foreach($role as $r){
            if($r->role_id  != $request->input('role_id')){
                // $user->roles()->attach($request->input('role_id'));
            }
        }
        return redirect()->route('admin.patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $role =  UserRole::where('user_id', $id)->get();
        foreach($role as $r){
            $user->roles()->detach($r->id);
        }
        $user->delete();
        return redirect()->route('admin.patients.index');
    }
}


