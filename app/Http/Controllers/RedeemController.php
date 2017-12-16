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
        $redeem = Redeem::all();
        
        return Datatables::of($redeem)
                        ->addColumn('name', function($redeem ) {
                            return $redeem->user->name;
                        })
                        ->addColumn('mobile', function($redeem ) {
                            return $redeem->user->mobile==""?$redeem->user->mobile:'Not available';
                        })
                        ->make(true);
    }
    
    public function setRedeemStatus(Request $request)
    {
        $redeem=Redeem::where('user_id',$request->customer_id)->first();
//        dd($redeem);
        $redeem->status=$request->status;
        $redeem->save();
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
