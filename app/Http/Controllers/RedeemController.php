<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Redeem;
use Validator;
use Image;

class RedeemController extends Controller {

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
    public function listRedeem() {
        return view('redeem.list');
    }

    public function redeemData() {
        $redeem = Redeem::where('status',0)->get();
        
        return Datatables::of($redeem)
                        
                        
                        ->addColumn('redeem_type', function($redeem ) {
                            return $redeem->redeem_type==0?'Cash-Back':'Rewards';
                        })
                        ->addColumn('payment_type', function($redeem ) {
                            if($redeem->payment_type==0)
                                return 'Tez';
                            if($redeem->payment_type==1)
                                return 'Paytm';
                            if($redeem->payment_type==2)
                                return 'Bank Account';
                        })
                        ->make(true);
    }
    
    public function setRedeemStatus(Request $request)
    {
        $redeem=Redeem::find($request->id);
        $redeem->status=$request->status;
        $redeem->save();
        
        
         $globalwallet = \App\Models\GlobalWallet::where('flingal_id',$redeem->flingal_id)->first();
         
         if ($redeem->redeem_type == 0) {
            $globalwallet->cb_amount = $globalwallet->cb_amount - $redeem->redeem_amount;
        } else {
            $globalwallet->reward_amount = $globalwallet->reward_amount - $redeem->redeem_amount;
        }
        
        $globalwallet->save();
        echo 1;
    }
    

//    public function createCategory(Request $request)
//    {
//        if($request->method()=="GET")
//        {
//            return view('category.create');
//        }
//        else
//        {
//           $validator = Validator::make($request->all(), [
//                        'name' => 'required',
//                        'icon' => 'required',
//                        'image' => 'required',
//            ]);
//             if ($validator->fails()) {
//            return redirect()->back()
//                        ->withErrors($validator)
//                        ->withInput();
//            }
//            
//            $category=  new Category();
//            $category->name=$request->name;
//            $category->icon=$request->icon;
//            $category->is_featured=$request->is_featured? $request->is_featured:'0';
//            $category->status=$request->status;
//            if ($request->hasFile('image')) {
//                $photo = $request->file('image');
//                $ext = $request->image->getClientOriginalExtension();
//                $new_name = time() . '.' . $ext;
//                
//                $destinationPath = public_path('backend/img/category-image/image-277-317');
//                $thumb_img = Image::make($photo->getRealPath())->resize(277, 317);
//                $thumb_img->save($destinationPath . '/' . $new_name);
//                
//                $destinationPath = public_path('backend/img/category-image/image-277-264');
//                $thumb_img = Image::make($photo->getRealPath())->resize(277, 264);
//                $thumb_img->save($destinationPath . '/' . $new_name);
//
//                $destinationPath = public_path('backend/img/category-image');
//                $photo->move($destinationPath, $new_name);
//                
//                $category->image=$new_name;
//            }
//            $category->save();
//            return redirect('admin/manage-category')->with('success','Category Added Successfully!');
//        }
//    }
//
//    public function updateCategory(Request $request, $id) {
//        $category = Category::find($id);
//        if ($request->method() == "GET") {
//            return view('category.edit', ['category' => $category]);
//        } else {
//            $validator = Validator::make($request->all(), [
//                        'name' => 'required',
//                        'icon' => 'required',
//                        'image' => 'required',
//            ]);
//             if ($validator->fails()) {
//            return redirect()->back()
//                        ->withErrors($validator)
//                        ->withInput();
//        }
//        
//            $category->name=$request->name;
//            $category->icon=$request->icon;
//            $category->is_featured=$request->is_featured? $request->is_featured:'0';
//            $category->status=$request->status;
//            if ($request->hasFile('image')) {
//                $photo = $request->file('image');
//                $ext = $request->image->getClientOriginalExtension();
//                $new_name = time() . '.' . $ext;
//                
//                $destinationPath = public_path('backend/img/category-image/image-277-317');
//                $thumb_img = Image::make($photo->getRealPath())->resize(277, 317);
//                $thumb_img->save($destinationPath . '/' . $new_name);
//                
//                $destinationPath = public_path('backend/img/category-image/image-277-264');
//                $thumb_img = Image::make($photo->getRealPath())->resize(277, 264);
//                $thumb_img->save($destinationPath . '/' . $new_name);
//
//                $destinationPath = public_path('backend/img/category-image');
//                $photo->move($destinationPath, $new_name);
//                
//                $category->image=$new_name;
//            }
//            $category->save();
//            
//            return redirect('admin/manage-category');
//        }
//    }
//    
//    public function deleteCategory($id)
//    {
//        $category=Category::find($id);
//        $category->delete();
//        return redirect('admin/manage-category')->with('success','Category deleted successfully!');
//    }

}
