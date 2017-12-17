<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;

use Validator;


class GlobalWalletController extends Controller {

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
    public function listGlobalWallet() {
        return view('globalwallet.list');
    }

    public function globalWalletData() {
        $globalwallet = User::where('user_type','2')->get();
        
        return Datatables::of($globalwallet)
                       
                        ->make(true);
    }

 

    public function updateGlobalWallet(Request $request, $id, $flag) {
        $globalwallet = User::find($id);
        if ($request->method() == "GET") {
            return view('globalwallet.edit', ['globalwallet' => $globalwallet,'flag'=>$flag]);
        } else {
            $validator = Validator::make($request->all(), [
                      
                        'amount' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
          if($flag=="add")
          {
          $globalwallet->amount=$globalwallet->amount + $request->amount;
          
          }else{
          $globalwallet->amount= $globalwallet->amount - $request->amount;
              
          }
            $globalwallet->save();
            
            return redirect('admin/manage-global-wallet');
        }
    }
    
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('admin/manage-category')->with('success','Category deleted successfully!');
    }

}
