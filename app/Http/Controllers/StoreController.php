<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Store;
use Validator;
use Image;

class StoreController extends Controller {

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
    public function listStore() {
        return view('store.list');
    }

    public function storeData() {
        $global_value = Store::all();
        return Datatables::of($global_value)
                        ->addColumn('status', function($cms) {
                            return $cms->status == '1' ? 'Published' : "Unpublished";
                        })
                        ->make(true);
    }

    public function createStore(Request $request)
    {
        if($request->method()=="GET")
        {
            return view('store.create');
        }
        else
        {
           $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'link' => 'required',
//                        'image' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $store=  new Store();
            $store->name=$request->name;
            $store->link=$request->link;
            $store->offer_line=$request->offer_line?$request->offer_line:"";
            $store->status=$request->status;
            if($request->hasFile('image'))
            {
                $ext=$request->image->getClientOriginalExtension();
                $new_name= time().'.'.$ext;
                $destinationPath = public_path('/public/backend/img/');
            }
//            $store->save();
//            return redirect('admin/manage-store')->with('success','Store Added Successfully!');
        }
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
            
            return redirect('admin/manage-global-value');
        }
    }
    
    public function deleteStore($id)
    {
        $store=Store::find($id);
        $store->delete();
        return redirect('admin/manage-store')->with('success','Store deleted successfully!');
    }

}
