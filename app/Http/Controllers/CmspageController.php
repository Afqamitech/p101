<?php

namespace App\Http\Controllers;

use DataTables;
use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Models\CmsPage;
use Validator;

class CmspageController extends Controller {

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
    public function listPages() {
        return view('cmspages.list');
    }

    public function dataPages() {
        $cms_page = CmsPage::all();
        return Datatables::of($cms_page)
                        ->addColumn('status', function($cms) {
                            return $cms->status == '1' ? 'Published' : "Unpublished";
                        })
                        ->make(true);
    }

    public function updatePage(Request $request, $id) {
        $cms_page = CmsPage::find($id);
        if ($request->method() == "GET") {
            return view('cmspages.edit', ['cmspage' => $cms_page]);
        } else {
            
            $validator = Validator::make($request->all(), [
                        'description' => 'required',
            ]);
             if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
            $cms_page->description=$request->description;
            $cms_page->save();
            
            return redirect('admin/cms-page');
        }
    }

}
