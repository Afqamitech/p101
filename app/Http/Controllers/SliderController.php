<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Slider;
use Validator;
use Image;
use App\Models\Store;
use App\Models\Coupon;

class SliderController extends Controller {

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
    public function listSlider() {
        return view('slider.list');
    }

    public function sliderData() {
        $slider = Slider::all();
        return Datatables::of($slider)
                      ->make(true);
    }

    public function createSlider(Request $request)
    {
        if($request->method()=="GET")
        {
            return view('slider.create');
        }
        else
        {
           $validator = Validator::make($request->all(), [
                        'image' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $slider=  new Slider();
                $slider->url= $request->slider_link!=0?$request->data:'';
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;
                
                $destinationPath = public_path('backend/img/slider/main');
                $thumb_img = Image::make($photo->getRealPath())->resize(1681, 647);
                $thumb_img->save($destinationPath . '/' . $new_name);
                
                $destinationPath = public_path('backend/img/slider/thumb');
                $thumb_img = Image::make($photo->getRealPath())->resize(200, 200);
                $thumb_img->save($destinationPath . '/' . $new_name);

                $destinationPath = public_path('backend/img/slider');
                $photo->move($destinationPath, $new_name);
                
                $slider->image=$new_name;
            $slider->save();
            return redirect('admin/manage-slider')->with('success','Slider Image Added Successfully!');
        }
    }

    public function updateSlider(Request $request, $id) {
        $slider = Slider::find($id);
        if ($request->method() == "GET") {
            return view('slider.edit', ['slider' => $slider]);
        } else {
//            $validator = Validator::make($request->all(), [
//                        'image' => 'required',
//            ]);
//             if ($validator->fails()) {
//            return redirect()->back()
//                        ->withErrors($validator)
//                        ->withInput();
//        }
        
                $slider->slider_url= $request->slider_link;
                $slider->url= $request->slider_link!=0?$request->data:'';
                $photo = $request->file('image');
                if($request->hasFile('image'))
                {
                    $ext = $request->image->getClientOriginalExtension();
                    $new_name = time() . '.' . $ext;

                    $destinationPath = public_path('backend/img/slider/main');
                    $thumb_img = Image::make($photo->getRealPath())->resize(1681, 647);
                    $thumb_img->save($destinationPath . '/' . $new_name);

                    $destinationPath = public_path('backend/img/slider/thumb');
                    $thumb_img = Image::make($photo->getRealPath())->resize(277, 264);
                    $thumb_img->save($destinationPath . '/' . $new_name);

                    $destinationPath = public_path('backend/img/slider');
                    $photo->move($destinationPath, $new_name);

                    $slider->image=$new_name;
                }
            $slider->save();
            
            return redirect('admin/manage-slider');
        }
    }
    
    public function deleteSlider($id)
    {
        $slider=Slider::find($id);
        $slider->delete();
        return redirect('admin/manage-slider')->with('success','Slider Image deleted successfully!');
    }
    
    public function getData(Request $request)
    {
        if($request->parameter=='store')
        {
            $store= Store::all();
            return $store;
        }
        if($request->parameter=='coupon')
        {
            $coupon= Coupon::all();
            return $coupon;
        }
    }

}
