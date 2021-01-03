<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Visit;
use App\Models\UserRole;
use Auth;


class VisitController extends Controller
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
        $visits = Visit::all();
        $doctors =  UserRole::where('role_id', '2')->get();
        return view('admin.visits.index', [
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
        $roles =  UserRole::where('role_id', '2')->get();
        return view('admin.visits.create', [
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
            'doctor_id' => 'required'
        ]);
        $visit = new Visit;
        $visit->visitDay = $request->input('date');
        $visit->visitTime = $request->input('time');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->user_id = Auth::id();
        $visit->save();
        

        return redirect()->route('admin.visits.index');
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
        return view('admin.visits.show', [
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
        $doctors =  UserRole::where('role_id', '2')->get();
        $visit = Visit::findOrFail($id);
        return view('admin.visits.edit', [
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
            'doctor_id' => 'required'
        ]);

        $visit =  Visit::findOrFail($id);
        $visit->visitDay = $request->input('date');
        $visit->visitTime = $request->input('time');
        $visit->doctor_id = $request->input('doctor_id');
        $visit->user_id = Auth::id();
        $visit->save();
        

        return redirect()->route('admin.visits.index');
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
        return redirect()->route('admin.visits.index');
    }
}
