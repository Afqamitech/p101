<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Validator;
use Image;

class UserController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    
    public function __construct() {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function listUser(Request $request) {
        
        $users =null;
        if($request->has('search'))
        {
                $users = \App\User::where('user_type','2')->where('flingal_id','like',"%".$request->search."%")->get();
        }

        return view('users.list',['users'=>$users,'request'=>$request]);
    }

    public function userData(Request $request) {
        
        
        $users = \App\User::where('user_type','2')->get();
        
        
       
        return Datatables::of($users)

                ->make(true);
    }
public function viewDetail(Request $request, $id) {
    
   $user = User::find($id);
        if ($request->method() == "GET") {
            return view('users.view', ['user' => $user]);
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
}
