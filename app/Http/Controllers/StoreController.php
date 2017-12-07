<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\Store;
use Validator;
use Image;
use App\Models\Category;

class StoreController extends Controller {

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
    public function listStore() {
        return view('store.list');
    }

    public function storeData() {
        $stores = Store::all();
        return Datatables::of($stores)
                        ->addColumn('status', function($store) {
                            return $store->status == '1' ? 'Published' : "Unpublished";
                        })
                        ->addColumn('category', function($store) {
                            return $store->category->name;
                        })
                        ->make(true);
    }

    public function createStore(Request $request) {
        if ($request->method() == "GET") {
            $category=  Category::all();
            return view('store.create',['categories'=>$category]);
        } else {
            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'link' => 'required',
                        'image' => 'required',
                        'category' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }

            $store = new Store();
            
            $store->category_id = $request->category;
            $store->name = $request->name;
            $store->link = $request->link;
            $store->offer_line = $request->offer_line ? $request->offer_line : "";
            $store->status = $request->status;
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;
                $destinationPath = public_path('backend/img/store-image-thumb');
                
                $thumb_img = Image::make($photo->getRealPath())->resize(324, 143);
                $thumb_img->save($destinationPath . '/' . $new_name);

                $destinationPath = public_path('backend/img/store-image');
                $photo->move($destinationPath, $new_name);
                
                $store->image=$new_name;
            }
            $store->save();
            return redirect('admin/manage-store')->with('success','Store Added Successfully!');
        }
    }

    public function updateStore(Request $request, $id) {
        $store = Store::find($id);
        if ($request->method() == "GET") {
            $category=  Category::all();
            return view('store.edit', ['store' => $store,'categories'=>$category]);
        } else {

            $validator = Validator::make($request->all(), [
                        'name' => 'required',
                        'link' => 'required',
                        'category' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                ->withErrors($validator)
                                ->withInput();
            }
            
            $store->category_id = $request->category;
            $store->name = $request->name;
            $store->link = $request->link;
            $store->offer_line = $request->offer_line ? $request->offer_line : "";
            $store->status = $request->status;
            
            if ($request->hasFile('image')) {
                $photo = $request->file('image');
                $ext = $request->image->getClientOriginalExtension();
                $new_name = time() . '.' . $ext;
                $destinationPath = public_path('backend/img/store-image-thumb');
                
                $thumb_img = Image::make($photo->getRealPath())->resize(324, 143);
                $thumb_img->save($destinationPath . '/' . $new_name);

                $destinationPath = public_path('backend/img/store-image');
                $photo->move($destinationPath, $new_name);
                
                $store->image=$new_name;
            }
            $store->save();
            return redirect('admin/manage-store')->with('success','Store Added Successfully!');
        }
    }

    public function deleteStore($id) {
        $store = Store::find($id);
        $store->delete();
        return redirect('admin/manage-store')->with('success', 'Store deleted successfully!');
    }

}
