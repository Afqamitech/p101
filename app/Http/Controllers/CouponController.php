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
                        'image' => 'required',
                        'offer_line' => 'required',
                        'expiry_date' => 'required',
                        'store' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }
            $coupon = new Coupon();
            $coupon->category_id = $request->category;
            $coupon->store_id = $request->store;
            $coupon->name = $request->name;
            $coupon->label = $request->label;
            $coupon->offer_line = $request->offer_line;
            $coupon->deal_of_the_day = $request->deal_of_the_day;
            $coupon->expiry_date = $request->expiry_date;
            $coupon->status = $request->status;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;

                $destinationPath = public_path('backend/img/coupon-image/thumb');
                $thumb_img = Image::make($photo->getRealPath())->resize(324, 143);
                $thumb_img->save($destinationPath . '/' . $new_name);

                $destinationPath = public_path('backend/img/coupon-image');
                $photo->move($destinationPath, $new_name);

                $coupon->image = $new_name;
            }
            $coupon->save();
            return redirect('admin/manage-coupon')->with('success', 'Coupon Added Successfully!');
        }
    }

    public function updateCoupon(Request $request, $id) {
        $coupon = Coupon::find($id);
        if ($request->method() == "GET") {
            $category=  Category::all();
            return view('coupon.edit', ['coupon' => $coupon,'categories'=>$category]);
        } else {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'label' => 'required',
                        'offer_line' => 'required',
                        'expiry_date' => 'required',
                        'store' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }

            $coupon->category_id = $request->category;
            $coupon->store_id = $request->store;
            $coupon->name = $request->name;
            $coupon->label = $request->label;
            $coupon->offer_line = $request->offer_line;
            $coupon->deal_of_the_day = $request->deal_of_the_day;
            $coupon->expiry_date = $request->expiry_date;
            $coupon->status = $request->status;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;

                $destinationPath = public_path('backend/img/coupon-image/thumb');
                $thumb_img = Image::make($photo->getRealPath())->resize(324, 143);
                $thumb_img->save($destinationPath . '/' . $new_name);

                $destinationPath = public_path('backend/img/coupon-image');
                $photo->move($destinationPath, $new_name);

                $coupon->image = $new_name;
            }
            $coupon->save();
            return redirect('admin/manage-coupon')->with('success', 'Coupon Added Successfully!');
        }
    }

    public function deleteCoupon($id) {
        $coupon = Coupon::find($id);
        $coupon->delete();
        return redirect('admin/manage-coupon')->with('success', 'Coupon deleted successfully!');
    }

    public function getStores(Request $request) {
        $store = Store::where('category_id', $request->category_id)->get();
        return $store;
    }

}
