<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Category;
use Validator;
use Image;

class CategoryController extends Controller {

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
        return view('category.list');
    }

    public function categoryData() {
        $global_value = Category::all();
        return Datatables::of($global_value)
                        ->addColumn('status', function($cms) {
                            return $cms->status == '1' ? 'Published' : "Unpublished";
                        })
                        ->make(true);
    }

    public function createCategory(Request $request)
    {
        if($request->method()=="GET")
        {
            return view('category.create');
        }
        else
        {
           $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'icon' => 'required',
//                        'image' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $category=  new Category();
            $category->name=$request->name;
            $category->icon=$request->icon;
            $category->is_featured=$request->is_featured? $request->is_featured:'0';
            $category->status=$request->status;
            $category->image='';
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;
                $destinationPath = public_path('backend/img/category-image-thumb');
                
                $thumb_img = Image::make($photo->getRealPath())->resize(324, 143);
                $thumb_img->save($destinationPath . '/' . $new_name);

                $destinationPath = public_path('backend/img/category-image');
                $photo->move($destinationPath, $new_name);
                
                $category->image=$new_name;
            }
            $category->save();
            return redirect('admin/manage-category')->with('success','Category Added Successfully!');
        }
    }

    public function updateGlobalValue(Request $request, $id) {
        $global_value = GlobalValue::find($id);
        if ($request->method() == "GET") {
            return view('globalvalues.edit', ['global_value' => $global_value]);
        } else {
            
            $validator = Validator::make($request->all(), [
                        'value' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
            $global_value->value=$request->value;
            $global_value->save();
            
            return redirect('admin/manage-global-value');
        }
    }
    
    public function deleteCategory($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('admin/manage-category')->with('success','Category deleted successfully!');
    }

}
