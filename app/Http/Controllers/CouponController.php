<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Coupon;
use Validator;
use Image;

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
                        ->make(true);
    }

    public function createCoupon(Request $request)
    {
        if($request->method()=="GET")
        {
            return view('coupon.create');
        }
        else
        {
           $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'label' => 'required',
                        'image' => 'required',
                        'offer_line' => 'required',
                        'expiry_date' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            $coupon=new Coupon();
            $coupon->name=$request->name;
            $coupon->label=$request->label;
            $coupon->offer_line=$request->offer_line;
            $coupon->deal_of_the_day=$request->deal_of_the_day;
            $coupon->expiry_date=$request->expiry_date;
            $coupon->status=$request->status;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;
                
                $destinationPath = public_path('backend/img/coupon-image/thumb');
                $thumb_img = Image::make($photo->getRealPath())->resize(324, 143);
                $thumb_img->save($destinationPath . '/' . $new_name);
                
                $destinationPath = public_path('backend/img/coupon-image');
                $photo->move($destinationPath, $new_name);
                
                $coupon->image=$new_name;
            }
            $coupon->save();
            return redirect('admin/manage-coupon')->with('success','Coupon Added Successfully!');
        }
    }

    public function updateCoupon(Request $request, $id) {
        $coupon = Coupon::find($id);
        if ($request->method() == "GET") {
            return view('coupon.edit', ['coupon' => $coupon]);
        } else {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'label' => 'required',
                        'image' => 'required',
                        'offer_line' => 'required',
                        'expiry_date' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
            $coupon->name=$request->name;
            $coupon->label=$request->label;
            $coupon->offer_line=$request->offer_line;
            $coupon->deal_of_the_day=$request->deal_of_the_day;
            $coupon->expiry_date=$request->expiry_date;
            $coupon->status=$request->status;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;
                
                $destinationPath = public_path('backend/img/coupon-image/thumb');
                $thumb_img = Image::make($photo->getRealPath())->resize(324, 143);
                $thumb_img->save($destinationPath . '/' . $new_name);
                
                $destinationPath = public_path('backend/img/coupon-image');
                $photo->move($destinationPath, $new_name);
                
                $coupon->image=$new_name;
            }
            $coupon->save();
            return redirect('admin/manage-coupon')->with('success','Coupon Added Successfully!');
        }
    }
    
    public function deleteCoupon($id)
    {
        $coupon=Coupon::find($id);
        $coupon->delete();
        return redirect('admin/manage-coupon')->with('success','Coupon deleted successfully!');
    }

}
