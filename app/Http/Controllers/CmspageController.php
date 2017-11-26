<?php

namespace App\Http\Controllers;
use DataTable;

use Illuminate\Http\Request;
use Auth;
use App\User;

class CmspageController extends Controller
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
    public function listPages()
    {
        return view('cmspages.list');
    }
    public function dataPages()
    {dd(6);
        $users = User::all();
        return Datatables::of($users)
            ->make(true);
    }
}
