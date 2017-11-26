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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->userInformation->user_type==1)
        {
            return redirect('admin/dashboard');
        }
        else
        {
            if(Auth::user()->userInformation->user_type==2 && Auth::user()->userInformation->user_status==1)
            {
                return view('home');
            }
            else {
                return redirect('/login')->with('error','Something went wrong');
            }
        }
        
    }
}
