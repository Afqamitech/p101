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
    public function listGlobalWallet(Request $request) {
        
        $globalwallet =null;
        if($request->has('search'))
        {
            $globalwallet = \App\Models\GlobalWallet::where('status',1)->where('flingal_id','like',"%".$request->search."%")->get();
            
        }
        return view('globalwallet.list',['globalwallet'=>$globalwallet,'request'=>$request]);
    }

    public function globalWalletData() {
        $globalwallet = \App\Models\GlobalWallet::where('status',1)->get();
        
        return Datatables::of($globalwallet)
                        ->addColumn('amount', function($obj) {
                            
                           
                            return $obj->reward_amount + $obj->cb_amount +  $obj->refral_amount;
                            
                        })->make(true);
    }

 

    public function updateGlobalWallet(Request $request, $id, $flag) {
        $globalwallet = \App\Models\GlobalWallet::find($id);
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
              
              if($request->wallet_type==1)
              {
                $globalwallet->cb_amount=$globalwallet->cb_amount + $request->amount;
              }else{
                $globalwallet->reward_amount=$globalwallet->reward_amount + $request->amount;  
              }
          }else{
            if($request->wallet_type==1)
              {
                $globalwallet->cb_amount=$globalwallet->cb_amount - $request->amount;
              }else{
                $globalwallet->reward_amount=$globalwallet->reward_amount - $request->amount;  
              }
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
