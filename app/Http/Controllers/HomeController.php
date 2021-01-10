<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $home = 'home';

        if($user->hasRole('admin')){
            $home = 'admin.home';
        }
        elseif ($user->hasRole('patient')) {
            $home = 'user.patients.home';
        }
        elseif ($user->hasRole('doctor')) {
            $home = 'user.doctors.home';
        }
        elseif ($user->hasRole('user')) {
            $home = 'home';
        }

        // return redirect()->route($home);
        return view($home);
    }
}
