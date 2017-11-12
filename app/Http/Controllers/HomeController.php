<?php

namespace ITube\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ITube\Projects;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Projects::all();
        return view('dashboard.view',array('user'=>Auth::user()),compact('projects'));
    }

    public function projectsList(){
        $projects = Projects::all();
        $user = Auth::user();
        
        return view('dashboard.view',compact('projects','user'));
    }
}
