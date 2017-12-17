<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\OrderHistory;
use Validator;


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
        $order_history_data = OrderHistory::all();
        return Datatables::of($order_history_data)
                        ->addColumn('status', function($cms) {
                            return $cms->status == '0' ? 'Pending' : $cms->status == '1' ? "Approved": "Paid";
                        })
                        ->make(true);
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
                        'status' => 'required',
                        'amount' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $order=  new OrderHistory();
            $order->flingal_id=$request->flingal_id;
            $order->order_id=$request->order_id;
            $order->title=$request->title;
            $order->status=$request->status;
            $order->amount=$request->amount;
            $order->save();
            return redirect('admin/manage-order-history')->with('success','Order History Added Successfully!');
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
                        'status' => 'required',
                        'amount' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
            $orderHistory->flingal_id=$request->flingal_id;
            $orderHistory->order_id=$request->order_id;
            $orderHistory->title=$request->title;
            $orderHistory->status=$request->status;
            $orderHistory->amount=$request->amount;
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
