<?php

namespace App\Http\Controllers\BackendController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Publisher;
use Carbon\Carbon;
use Session;
class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $publishers = Publisher::all();
        $softDeletedPublishers = Publisher::onlyTrashed()->get();
        return view('backend.publisher', compact('publishers', 'softDeletedPublishers'));
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
            'publisher' => 'required',
        ]);

        Publisher::insert([
            'publisher' => $request->publisher,
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
        $publisher = Publisher::findOrFail($id);
        return view('backend.publisher-edit', compact('publisher'));
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
            'publisher'=>'required',
        ]);

        $id = Crypt::decrypt($id);
        Publisher::findOrFail($id)->update([
            'publisher' => $request->publisher,
        ]);

        Session::flash('updated','Updated Successfully');
        return redirect()->route('publisher');
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
        Publisher::findOrFail($id)->delete();
        Session::flash('deleted', 'Deleted Successfully');
        return redirect()->route('publisher');
    }

    public function restore($id){
        $id = Crypt::decrypt($id);
        Publisher::onlyTrashed()->find($id)->restore();
        Session::flash('success','Restored Successfully.');
        return back();
    }

    public function permanentDelete($id){
        $id = Crypt::decrypt($id);
        Publisher::onlyTrashed()->findOrFail($id)->forceDelete();
        Session::flash('deleted','Permanently Deleted.');
        return back();
    }
}
