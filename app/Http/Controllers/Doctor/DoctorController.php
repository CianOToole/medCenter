<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Visit;
use App\Models\UserRole;
use Auth;


class DoctorController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:doctor');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visits = Visit::where('doctor_id', Auth::id())->get();
        $doctors =  UserRole::where('role_id', '2')->get();
        return view('user.doctors.index', [
            'visits' => $visits,
            'doctors' => $doctors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles =  UserRole::where('role_id', '3')->get();
        return view('user.doctors.create', [
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
            'date' => 'required|max:191',
            'time' => 'required|max:191',
            'patient_id' => 'required',
            'price' => 'required'
        ]);
        $visit = new Visit;
        $visit->visitDay = $request->input('date');
        $visit->visitTime = $request->input('time');
        $visit->patient_id = $request->input('patient_id');
        $visit->doctor_id = Auth::id();
        $visit->price = $request->input('price');
        $visit->save();
        

        return redirect()->route('user.doctors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $visit = Visit::findOrFail($id);
        $role =  UserRole::where('user_id', $visit->doctor_id)->get();
        return view('user.doctors.show', [
            'visit' => $visit,
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
        $doctors =  UserRole::where('role_id', '3')->get();
        $visit = Visit::findOrFail($id);
        return view('user.doctors.edit', [
            'visit' => $visit,
            'doctors' => $doctors
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
        $request->validate([
            'date' => 'required|max:191',
            'time' => 'required|max:191',
            'patient_id' => 'required',
            'price' => 'required'
        ]);

        $visit =  Visit::findOrFail($id);
        $visit->visitDay = $request->input('date');
        $visit->visitTime = $request->input('time');
        $visit->patient_id = $request->input('patient_id');
        $visit->doctor_id = Auth::id();
        $visit->price = $request->input('price');
        $visit->save();
        

        return redirect()->route('user.doctors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        return redirect()->route('user.doctors.index');
    }
}
