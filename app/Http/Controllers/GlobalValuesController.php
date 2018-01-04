<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\GlobalValue;
use Validator;

class GlobalValuesController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function listGlobalValues() {
        return view('globalvalues.list');
    }

    public function globalValueData() {
        $global_value = GlobalValue::all();
        return Datatables::of($global_value)
//                        ->addColumn('status', function($cms) {
//                            return $cms->status == '1' ? 'Published' : "Unpublished";
//                        })
                        ->make(true);
    }

    public function updateGlobalValue(Request $request, $id) {
        $global_value = GlobalValue::find($id);
        if ($request->method() == "GET") {
            return view('globalvalues.edit', ['global_value' => $global_value]);
        } else {
            
            $validator = Validator::make($request->all(), [
                        'value' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
            $global_value->value=$request->value;
            $global_value->save();
            
            return redirect('admin/global-value');
        }
    }

}
