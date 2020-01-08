<?php

namespace App\Http\Controllers\BackendController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Session;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $softDeletedCategories = Category::onlyTrashed()->get();
        return view('backend.category', compact('categories', 'softDeletedCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
        ]);


        Category::insert([
            'category_name' => $request->category_name,
            'created_at' => Carbon::now()
        ]);

        Session::flash('success','Successfully created.');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $category = Category::findOrFail($id);
        return view('backend.category-edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name'=>'required',
        ]);

        $id = Crypt::decrypt($id);
        Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
        ]);

        Session::flash('updated','Updated Successfully');
        return redirect()->route('category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = Crypt::decrypt($id);
        Category::findOrFail($id)->delete();
        Session::flash('deleted', 'Deleted Successfully');
        return redirect()->route('category');
    }

    public function restore($id){
        $id = Crypt::decrypt($id);
        Category::onlyTrashed()->find($id)->restore();
        Session::flash('success','Restored Successfully.');
        return back();
    }

    public function permanentDelete($id){
        $id = Crypt::decrypt($id);
        Category::onlyTrashed()->findOrFail($id)->forceDelete();
        Session::flash('deleted','Permanently Deleted.');
        return back();
    }
}
