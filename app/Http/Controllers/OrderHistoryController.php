<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\OrderHistory;
use App\Models\GlobalWallet;
use Validator;
use Session;


class OrderHistoryController extends Controller {

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
    public function listOrderHistory() {
        return view('orderhistory.list');
    }

    public function orderHistoryData() {
        $order_history_data = OrderHistory::orderBy('id','DESC')->where('status',0)->get();
        
        
        return Datatables::of($order_history_data)
                        ->addColumn('status', function($cms) {
                            if($cms->status==0)
                            {
                            $str="<select onchange='return changeStatus(this,$cms->id)'>";
                            $str.="<option value='0'".($cms->status==0?'selected':'')." >Pending</option>";
                            $str.="<option value='1' ".($cms->status==1?'selected':'').">Approved</option>";
                            $str.="<option value='2' ".($cms->status==2?'selected':'').">Rejected</option>";
                            $str.="</select>";
                            return $str;
                            
                            }else{
                                return $cms->status==1?'Approved':'Rejected';
                            }
                        })
                        ->make(true);
    }

    
    public function changeStatus(Request $request){
        
        $orderHistory = OrderHistory::find($request->id);
        
        if($request->status == 1)
        {
        $globalWallet = GlobalWallet::where('flingal_id',$orderHistory->flingal_id)->where('status',1)->first();
        if($globalWallet)
        {
            //update record
            //check for amount type
            //1=>cashback, 2=>rewards
                if($orderHistory->type==1)
                {
                    $globalWallet->cb_amount += $orderHistory->amount;
                }else{
                    $globalWallet->reward_amount += $orderHistory->amount;
                }
                    $globalWallet->save();
        }else{
            //create new record
          $globalWallet= new GlobalWallet();
          $globalWallet->flingal_id = $orderHistory->flingal_id;
          $globalWallet->status = 1;
           if ($orderHistory->type == 1) {
                $globalWallet->cb_amount += $orderHistory->amount;
            } else {
                $globalWallet->reward_amount += $orderHistory->amount;
            }
            $globalWallet->save();
        }
        }
        echo OrderHistory::where('id',$request->id)->update(['status'=>$request->status]);
    }
    
    public function createOrderHistory(Request $request)
    {
        if($request->method()=="GET")
        {
            return view('orderhistory.create');
        }
        else
        {
           $validator = Validator::make($request->all(), [
                        'flingal_id' => 'required',
                        'order_id' => 'required',
                        'title' => 'required',
                        'amount' => 'required',
                        'type' => 'required',
                        'dot' => 'required',
                        'doa' => 'required',
                        'sale_amount' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            
            $user = User::where('flingal_id',$request->flingal_id)->first();
            
            if($user)
            {
            $order=  new OrderHistory();
            $order->flingal_id=$request->flingal_id;
            $order->order_id=$request->order_id;
            $order->title=$request->title;
            $order->status=0;
            $order->amount=$request->amount;
            $order->type=$request->type;
            $order->dot=$request->dot;
            $order->doa=$request->doa;
            $order->sale_amount=$request->sale_amount;
            $order->save();
            return redirect('admin/manage-order-history')->with('success','Order History Added Successfully!');
            }else{
                
                Session::flash('error','Please enter valid flingal id.');
            return redirect()->back()->withInput();
                
            }
        }
    }

    public function updateOrderHistory(Request $request, $id) {
        $orderHistory = OrderHistory::find($id);
        if ($request->method() == "GET") {
            return view('orderhistory.edit', ['orderHistory' => $orderHistory]);
        } else {
            $validator = Validator::make($request->all(), [
                        'flingal_id' => 'required',
                        'order_id' => 'required',
                        'title' => 'required',
                        'amount' => 'required',
                        'type' => 'required',
                        'dot' => 'required',
                        'doa' => 'required',
                        'sale_amount' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
            $orderHistory->flingal_id=$request->flingal_id;
            $orderHistory->order_id=$request->order_id;
            $orderHistory->title=$request->title;
            $orderHistory->amount=$request->amount;
            $orderHistory->type=$request->type;
            $orderHistory->dot=$request->dot;
            $orderHistory->doa=$request->doa;
            $orderHistory->sale_amount=$request->sale_amount;
            $orderHistory->save();
            
            return redirect('admin/manage-order-history');
        }
    }
    
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('admin/manage-category')->with('success','Category deleted successfully!');
    }

}
