<?php

namespace App\Http\Controllers\BackendController;

use App\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Session;
use App\Area;
use Carbon\Carbon;
class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $cities = City::all();
        $areas = Area::all();
        $softDeletedAreas = Area::onlyTrashed()->get();
        return view('backend.area', compact('cities', 'areas','softDeletedAreas'));
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
        $userId = Auth::id();
        print_r($userId);
        $request->validate([
            'area_name' => 'required | unique:areas',
            'city_id' => 'required'
        ]);
        Area::insert([
           'area_name' => $request->area_name,
           'city_id' => $request->city_id,
            'user_id' => $userId,
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
        $area = Area::findOrFail($id);
        $cities = City::all();
        return view('backend.area-edit', compact('area', 'cities'));
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
        $userId = Auth::id();
        $request->validate([
            'area_name' => 'required',
            'city_id' => 'required'
        ]);

        $id = Crypt::decrypt($id);
        Area::findOrFail($id)->update([
            'area_name' => $request->area_name,
            'city_id' => $request->city_id,
            'user_id' => $userId,
            'created_at' => Carbon::now()
        ]);

        Session::flash('updated','Updated Successfully');
        return redirect()->route('area');
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
        Area::findOrFail($id)->delete();
        Session::flash('deleted', 'Deleted Successfully');
        return redirect()->route('area');
    }

    public function restore($id){
        $id = Crypt::decrypt($id);
        Area::onlyTrashed()->find($id)->restore();
        Session::flash('success','Restored Successfully.');
        return back();
    }

    public function permanentDelete($id){
        $id = Crypt::decrypt($id);
        Area::onlyTrashed()->findOrFail($id)->forceDelete();
        Session::flash('deleted','Permanently Deleted.');
        return back();
    }
}
