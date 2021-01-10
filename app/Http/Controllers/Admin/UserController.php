<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserRole;
use Auth;


class UserController extends Controller
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
        $roles =  UserRole::where('role_id', '4')->get();
        return view('admin.users.index', [
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
        return view('admin.users.create', [
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
            'email' => 'required|max:191',
            'password' => 'required|max:191'
        ]);
        $user = new User;
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        $user->roles()->attach(Role::where('id', $request->input('role_id'))->first());

        return redirect()->route('admin.users.index');
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
        return view('admin.users.show', [
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
        return view('admin.users.edit', [
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
        $roleID = 4;
        $request->validate([
            'name' => 'required|max:191',
            'address' => 'required|max:191',
            'phone' => 'required|max:191',
            'email' => 'required|max:191'
        ]);

        $user =  User::findOrFail($id);
        $user->name = $request->input('name');
        $user->address = $request->input('address');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->save();
        // $user->roles()->attach($request->input('role_id'));
        // $user->roles()->detach($roleID);
        
        return redirect()->route('admin.users.index');
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
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function patient($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.users.patient', [
            'user' => $user,
            'roles' => $roles          
        ]);
    }

    public function makePatient(Request $request, $id)
    {
        
        $roleID = 4;
        $request->validate([
            'policy_number' => 'required|max:191',
            'insurance_company' => 'required|max:191',
            'user_id' => 'required',
            'role_id' => 'required'
            
        ]);
        $user = User::findOrFail($id);
        $patient = new Patient;
        $patient->policy_number = $request->input('policy_number');
        $patient->insurance_company = $request->input('insurance_company');
        $patient->user_id = $request->input('user_id');
        $patient->save();
        $user->roles()->attach($request->input('role_id'));
        $user->roles()->detach($roleID);
        
        return redirect()->route('admin.users.index');
    }

    public function makeDoctor($id)
    {
        $user = User::findOrFail($id);
        $doctor = new Doctor;
        $doctor->user_id = $user->id;
        $doctor->save();
        $user->roles()->attach(2);
        $user->roles()->detach(4);
        return redirect()->route('admin.users.index');
    }
}
