<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
      return view('test/create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $descriptions = $request->input('descriptions');
    $prices = $request->input('prices');
    $units = $request->input('units');

    print_r($descriptions);
    print_r($prices);
    print_r($units);

    //return redirect('/student');
  }
}
