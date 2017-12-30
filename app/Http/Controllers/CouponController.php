<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Coupon;
use Validator;
use Image;
use App\Models\Category;
use App\Models\Store;
use App\Models\CouponSubCategory;

class CouponController extends Controller {

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
    public function listCoupon() {
        return view('coupon.list');
    }

    public function couponData() {
        $coupon = Coupon::all();
        
        
        return Datatables::of($coupon)
                        ->addColumn('status', function($coupon) {
                            return $coupon->status == '1' ? 'Published' : "Unpublished";
                        })
                        ->addColumn('deal_of_the_day', function($coupon) {
                            return $coupon->deal_of_the_day == '1' ? 'Yes' : "No";
                        })
                        ->addColumn('category', function($coupon) {
                            
                            return $coupon->category->name;
                        })
                        ->addColumn('store', function($coupon) {
                            
                            return $coupon->store->name;
                        })
                        ->make(true);
    }

    public function createCoupon(Request $request) {
        if ($request->method() == "GET") {
                $category = Category::all();
            return view('coupon.create', ['categories' => $category]);
        } else {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'label' => 'required',
                        'offer_line' => 'required',
                        'expiry_date' => 'required',
                        'store' => 'required',
                        'coupon_code' => 'required_if:coupon_deal,0',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }
            $coupon = new Coupon();
            $coupon->coupon_type = $request->coupon_deal;
            $coupon->coupon_code = $request->coupon_deale==0?$request->coupon_code:'';
            $coupon->category_id = $request->category;
            $coupon->store_id = $request->store;
            $coupon->name = $request->name;
            $coupon->label = $request->label;
            $coupon->url = $request->url;
            $coupon->offer_line = $request->offer_line;
            $coupon->expiry_date = $request->expiry_date;
            $coupon->save();
            
            foreach($request->sub_category as $sub_category)
            {
                $coupon_sub_category=  new CouponSubCategory();
                $coupon_sub_category->coupon_id = $coupon->id;
                $coupon_sub_category->sub_category_id = $sub_category;
                $coupon_sub_category->save();
            }
            
            return redirect('admin/manage-coupon')->with('success', 'Coupon Added Successfully!');
        }
    }

    public function updateCoupon(Request $request, $id) {
        $coupon = Coupon::find($id);
        if ($request->method() == "GET") {
            $category=  Category::all();
            $sub_category=  \App\Models\SubCategory::where('category_id',$coupon->category_id)->get();
            $store=  Store::all();
            return view('coupon.edit', ['coupon' => $coupon,'categories'=>$category,'stores'=>$store,'sub_categories'=>$sub_category]);
        } else {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'label' => 'required',
                        'offer_line' => 'required',
                        'expiry_date' => 'required',
                        'store' => 'required',
                        'store' => 'required',
                        'coupon_code' => 'required_if:coupon_deal,0',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }

            $coupon->coupon_type = $request->coupon_deal;
            $coupon->coupon_code = $request->coupon_deale==0?$request->coupon_code:'';
            $coupon->category_id = $request->category;
            $coupon->store_id = $request->store;
            $coupon->name = $request->name;
            $coupon->label = $request->label;
            $coupon->url = $request->url;
            $coupon->offer_line = $request->offer_line;
            $coupon->expiry_date = $request->expiry_date;
            $coupon->save();
            
            CouponSubCategory::where('coupon_id',$coupon->id)->delete();
            if($request->sub_category)
            {
                foreach($request->sub_category as $sub_category)
                {
                    $coupon_sub_category=  new CouponSubCategory();
                    $coupon_sub_category->coupon_id = $coupon->id;
                    $coupon_sub_category->sub_category_id = $sub_category;
                    $coupon_sub_category->save();
                }
            }
            return redirect('admin/manage-coupon')->with('success', 'Coupon Added Successfully!');
        }
    }

    public function deleteCoupon($id) {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect('admin/manage-coupon')->with('success', 'Coupon deleted successfully!');
    }

    public function getStores(Request $request) {
        $category= Category::find($request->category_id);
        
        foreach($category->storeCategories as $category)
        {
            if($category->stores)
            $all_store[]=$category->stores;
        }
        return $all_store;
    }
    
    public function getSubCategory(Request $request)
    {
        $sub_category=  \App\Models\SubCategory::where('category_id',$request->category_id)->get();
        return $sub_category;
    }

}
