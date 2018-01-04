<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Mail;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
        
    }
    
    public function login()
    {
        return view('admin.login');
    }
    
    public function email()
    {
        $data=['name'=>'aamir'];
        Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('aamirkazi81@gmail.com', 'Testing')->subject
            ('Demo');
         $message->from('aamirkazi47@gmail.com','Aamir kazi');
         
      });
      dd('done');
    }
  
}
