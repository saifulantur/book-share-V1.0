<?php

namespace App\Http\Controllers\BackendController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\Author;
class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $authors = Author::all();
        $softDeletedAuthors = Author::onlyTrashed()->get();
        return view('backend.author', compact('authors', 'softDeletedAuthors'));
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
            'author_name' => 'required',
        ]);

        Author::insert([
            'author_name' => $request->author_name,
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
        $author = Author::findOrFail($id);
        return view('backend.author-edit', compact('author'));
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
           'author_name'=>'required',
        ]);

        $id = Crypt::decrypt($id);
        Author::findOrFail($id)->update([
           'author_name' => $request->author_name,
        ]);

        Session::flash('updated','Updated Successfully');
        return redirect()->route('author');
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
        Author::findOrFail($id)->delete();
        Session::flash('deleted', 'Deleted Successfully');
        return redirect()->route('author');
    }

    public function restore($id){
        $id = Crypt::decrypt($id);
        Author::onlyTrashed()->find($id)->restore();
        Session::flash('success','Restored Successfully.');
        return back();
    }

    public function permanentDelete($id){
        $id = Crypt::decrypt($id);
        Author::onlyTrashed()->findOrFail($id)->forceDelete();
        Session::flash('deleted','Permanently Deleted.');
        return back();
    }
}
