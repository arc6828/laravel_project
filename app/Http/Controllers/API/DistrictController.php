<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\District;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function provinces()
    {
      $provinces = District::groupBy('province_code')
        //->select('province', 'province_code')
        ->get();
      return response()->json($provinces);
    }

    public function amphoes($province_code)
    {
      $amphoes = District::where('province_code',$province_code)
        ->groupBy('amphoe_code')
        //->select('amphoe', 'amphoe_code')
        ->get();
      return response()->json($amphoes);
    }
    public function districts($province_code,$amphoe_code)
    {
      $districts = District::where('province_code',$province_code)
        ->where('amphoe_code',$amphoe_code)
        ->groupBy('district_code')
        //->select('district', 'district_code')
        ->get();
      return response()->json($districts);
    }
    public function detail($province_code,$amphoe_code,$district_code)
    {
      $districts = District::where('province_code',$province_code)
        ->where('amphoe_code',$amphoe_code)        
        ->where('district_code',$district_code)
        ->get();
      return response()->json($districts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
