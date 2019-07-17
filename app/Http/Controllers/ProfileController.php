<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function create( )
	{
		return view("profile/create");
	}

	public function edit($id)
	{
		$data = [
			"profile" => (object)[
			  	"id" => $id,
			  	"name" => "James" ,
			  	"lastname" =>  "Mars",
			  	"email" => "james@vru.ac.th",
			],
			"others" => "hello world", 
		];
		return view("profile/edit" , $data);
	}

	function gallery(){
	  $data = [
	    "ant" => "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg",
	    "bird" => "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg",
	    "cat" => "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg",
	    "god" => "https://amp.insider.com/images/5b7acee73cccd122008b45ac-750-563.jpg",
	    "spider" => "https://cdn1us.denofgeek.com/sites/denofgeekus/files/styles/main_wide/public/2019/03/spider-man-far-from-home-tom-holland.jpg",
	  ];
	  return view("test/index", $data);
	}

	function ant(){
	  $data = [
	    "ant" => "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg",
	  ];
	  return view("test/ant", $data);
	}

	function bird(){
	  $data = [
	    "bird" => "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg",
	  ];
	  return view("test/bird", $data);
	}


	function cat(){
	  $data = [
	    "cat" => "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg",
	  ];
	  return view("test/cat", $data);
	}
}
