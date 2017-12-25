<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\SubCategory;
use App\Models\Category;
use Validator;
use Image;

class SubCategoryController extends Controller {

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
    public function listSubCategory() {;
        return view('subcategory.list');
    }

    public function subCategoryData() {
        $sub_categories = SubCategory::all();
        return Datatables::of($sub_categories)
                        ->addColumn('category', function($category) {
                            return $category->category->name;
                        })
                        ->make(true);
    }

    public function createSubCategory(Request $request)
    {
        if($request->method()=="GET")
        {
            $category=  Category::all();
            return view('subcategory.create',['category'=>$category]);
        }
        else
        {
           $validator = Validator::make($request->all(), [
                        'name' => 'required',
             ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
            }
            
            $subcategory=  new SubCategory();
            $subcategory->name=$request->name;
            $subcategory->category_id=$request->category_id;
            $subcategory->save();
            return redirect('admin/manage-subcategory')->with('success','SubCategory Added Successfully!');
        }
    }

    public function updateSubCategory(Request $request, $id) {
        $subcategory = SubCategory::find($id);
        $category=  Category::all();
        if ($request->method() == "GET") {
            return view('subcategory.edit', ['subcategory' => $subcategory,'category'=>$category]);
        } else {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
            
            $subcategory->name=$request->name;
            $subcategory->category_id=$request->category_id;
            $subcategory->save();
            
            return redirect('admin/manage-subcategory');
        }
    }
    
    public function deleteSubCategory($id)
    {
        $subcategory=SubCategory::find($id);
        $subcategory->delete();
        return redirect('admin/manage-subcategory')->with('success','SubCategory deleted successfully!');
    }
    
}
