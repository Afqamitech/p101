<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Category;
use App\Models\PromotionalCategory;
use App\Models\PromotionalCategoryData;
use Validator;
use Image;

class PromotionalCategoryController extends Controller {

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
    public function listCategory() {
        return view('promotionalcategory.list');
    }

    public function categoryData() {
        $categories = PromotionalCategory::all();
        return Datatables::of($categories)
                        ->addColumn('status', function($category) {
                            return $category->status == '1' ? 'Published' : "Unpublished";
                        })
                        ->make(true);
    }

    public function createCategory(Request $request)
    {
        if($request->method()=="GET")
        {
            return view('promotionalcategory.create');
        }
        else
        {
           $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'icon' => 'required',
                        'image' => 'required',
                        'title' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $category=  new PromotionalCategory();
            $category->name=$request->name;
            $category->icon=$request->icon;
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
            if($request->values_id)
            {
                foreach($request->values_id as $index=>$data)
                {
                    $arr['promotional_category_id']=$category->id;
                    $arr['type']=$request->type;
                    $arr['store_id']=$request->type==1?$data:'';
                    $arr['coupon_id']=$request->type==0?$data:'';
                    $arr['old_value']=$request->old[$index];
                    $arr['new_value']=$request->new[$index];

                    PromotionalCategoryData::create($arr);
                }
            }
            
            return redirect('/admin/promotional-category')->with('success','Promotional Category Added Successfully!');
        }
    }

    public function updateCategory(Request $request, $id) {
        $category = PromotionalCategory::find($id);
        if ($request->method() == "GET") {
            return view('promotionalcategory.edit', ['category' => $category]);
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
            
            if($request->values_id)
            {
                foreach($request->values_id as $index=>$data)
                {
                    $arr['promotional_category_id']=$category->id;
                    $arr['type']=$request->type;
                    $arr['store_id']=$request->type==1?$data:'';
                    $arr['coupon_id']=$request->type==0?$data:'';
                    $arr['old_value']=$request->old[$index];
                    $arr['new_value']=$request->new[$index];

                    PromotionalCategoryData::create($arr);
                }
            }
            return redirect('admin/manage-category');
        }
    }
    
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('admin/manage-category')->with('success','Category deleted successfully!');
    }
    
    public function setfeatured(Request $request)
    {
        $category= Category::find($request->category_id);
        
        if($category->is_featured==1)
        {
            $category->is_featured=0;
        }
        else
        {
            $category->is_featured=1;
        }
        $category->save();
    }
    
    public function deleteData($id)
    {
        $category=PromotionalCategory::find($id);
        $id=$category->promotional_category_id;
        $category->delete();
        return redirect('/admin/promotional-category/update/'.$id);
    }

}
