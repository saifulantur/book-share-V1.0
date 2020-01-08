<?php

namespace App\Http\Controllers\BackendController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\City;
class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $softDeletedCities = City::onlyTrashed()->get();
        return view('backend.city', compact('cities', 'softDeletedCities'));
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
            'city_name' => 'required',
        ]);

        City::insert([
            'city_name' => $request->city_name,
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
        $city = City::findOrFail($id);
        return view('backend.city-edit', compact('city'));
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
            'city_name'=>'required',
        ]);

        $id = Crypt::decrypt($id);
        City::findOrFail($id)->update([
            'city_name' => $request->city_name,
        ]);

        Session::flash('updated','Updated Successfully');
        return redirect()->route('city');
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
        City::findOrFail($id)->delete();
        Session::flash('deleted', 'Deleted Successfully');
        return redirect()->route('city');
    }

    public function restore($id){
        $id = Crypt::decrypt($id);
        City::onlyTrashed()->find($id)->restore();
        Session::flash('success','Restored Successfully.');
        return back();
    }

    public function permanentDelete($id){
        $id = Crypt::decrypt($id);
        City::onlyTrashed()->findOrFail($id)->forceDelete();
        Session::flash('deleted','Permanently Deleted.');
        return back();
    }
}
