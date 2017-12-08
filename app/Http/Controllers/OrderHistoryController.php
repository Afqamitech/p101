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

    public function updateCategory(Request $request, $id) {
        $category = Category::find($id);
        if ($request->method() == "GET") {
            return view('category.edit', ['category' => $category]);
        } else {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'icon' => 'required',
                        'image' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
            $category->name=$request->name;
            $category->icon=$request->icon;
            $category->is_featured=$request->is_featured? $request->is_featured:'0';
            $category->status=$request->status;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;
                
                $destinationPath = public_path('backend/img/category-image/image-277-317');
                $thumb_img = Image::make($photo->getRealPath())->resize(277, 317);
                $thumb_img->save($destinationPath . '/' . $new_name);
                
                $destinationPath = public_path('backend/img/category-image/image-277-264');
                $thumb_img = Image::make($photo->getRealPath())->resize(277, 264);
                $thumb_img->save($destinationPath . '/' . $new_name);

                $destinationPath = public_path('backend/img/category-image');
                $photo->move($destinationPath, $new_name);
                
                $category->image=$new_name;
            }
            $category->save();
            
            return redirect('admin/manage-category');
        }
    }
    
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('admin/manage-category')->with('success','Category deleted successfully!');
    }

}
