 <?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test2', function () {
    return view('test');
});

Route::get('/home', function() {
	return '<h1>This is home page</h1>' ;
});

Route::get('/blog/{page_id}', function($page_id) {
	return "<h1>This is blog page : $page_id </h1>" ;
});

Route::get('/blog/{page_id}/edit', function($page_id) {
	return "<h1>This is blog page : $page_id for edit</h1>" ;
});

Route::get('/product/{a}/{b}/{c}', function($a, $b, $c) {
 	return "<h1>This is product page </h1><div>$a , $b, $c</div>" ;
});

Route::get('/category/{a?}', function($a = "mobile") {
	return "<h1>This is category page : $a </h1>" ;
});

Route::get('/hello', function () {
	return view('hello');
});

Route::get('/greeting', function () {
	$data = [
		'name'      => 'James' ,
		'last_name' => 'Mars'
	];
	return view('greeting', $data);

});

Route::get('/combine/{id}', function ($id) {
	$data = [
		'id' => $id
	];
	return view('combine', $data);
});

//FOR EMPLOYEE CONTROLLER
Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee', 'EmployeeController@store');
Route::get('/employee/{id}', 'EmployeeController@show');
Route::get('/employee/{id}/edit', 'EmployeeController@edit');
Route::put('/employee/{id}', 'EmployeeController@update');
Route::delete('/employee/{id}', 'EmployeeController@destroy');

/*
Route::get('/employee', 'EmployeeController@index')->middleware('role:admin,account');
Route::get('/employee/create', 'EmployeeController@create')->middleware('role:admin');
Route::post('/employee', 'EmployeeController@store')->middleware('role:admin');
Route::get('/employee/{id}', 'EmployeeController@show')->middleware('role:admin,account');
Route::get('/employee/{id}/edit', 'EmployeeController@edit')->middleware('role:admin');
Route::put('/employee/{id}', 'EmployeeController@update')->middleware('role:admin');
Route::delete('/employee/{id}', 'EmployeeController@destroy')->middleware('role:admin');

Route::get('/employee/upload-form', 'EmployeeController@upload_form')->middleware('role:admin');
Route::post('/employee/upload', 'EmployeeController@upload')->middleware('role:admin');
*/
//Route:resource('','EmployeController');

//FOR POSITION CONTROLLER
Route::get('/position', 'PositionController@index');
Route::get('/position/{id}', 'PositionController@show');

//FOR STUDENT CONTROLLER
Route::get('/student',          'StudentController@index');
Route::get('/student/create',   'StudentController@create');
Route::post('/student',         'StudentController@store');
Route::get('/student/{id}',     'StudentController@show');
Route::get('/student/{id}/edit','StudentController@edit');
Route::put('/student/{id}',     'StudentController@update');
Route::delete('/student/{id}',  'StudentController@destroy');

//FOR TEST CONTROLLER
Route::get('/test',          'TestController@index');
Route::get('/test/create',   'TestController@create');
Route::post('/test',         'TestController@store');
Route::get('/test/{id}',     'TestController@show');
Route::get('/test/{id}/edit','StudentController@edit');
Route::put('/test/{id}',     'StudentController@update');
Route::delete('/test/{id}',  'StudentController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/download/{filename}','EmployeeController@download');

Route::get('/position/{id}/pdf','PositionController@downloadPDF');
Route::get('/position/{id}/pdf','PositionController@downloadPDF');


Route::get('/downloadpdf', 'PositionController@downloadpdf');

Route::prefix('login')->group(function () {
    Route::get('/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
    Route::get('/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->name('login.provider.callback');
});

Route::get('/district/example','DistrictController@example');
Route::resource('/district','DistrictController');

Route::resource('admin/posts', 'Admin\\PostsController');


Route::get("/good_route",function(){
  return view("test/index");
});

Route::get("/gallery",function(){
  $data = [
    "ant" => "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg",
    "bird" => "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg",
    "cat" => "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg",
    "god" => "https://amp.insider.com/images/5b7acee73cccd122008b45ac-750-563.jpg",
    "spider" => "https://cdn1us.denofgeek.com/sites/denofgeekus/files/styles/main_wide/public/2019/03/spider-man-far-from-home-tom-holland.jpg",
  ];
  return view("test/index", $data);
});

Route::get("/gallery/ant",function(){
  $data = [
    "ant" => "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg",
  ];
  return view("test/ant", $data);
});
Route::get("/gallery/bird",function(){
  $data = [
    "bird" => "https://cdn1.thr.com/sites/default/files/imagecache/scale_crop_768_433/2019/04/captain_america-civil_war-anthony_mackie-photofest-h_2019.jpg",
  ];
  return view("test/bird", $data);
});

Route::get("/gallery/cat",function(){
  $data = [
    "cat" => "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg",
  ];
  return view("test/cat", $data);
});


Route::get("/profile/create","ProfileController@create");
Route::get("/profile/{id}/edit", "ProfileController@edit");

Route::get( "/newgallery" , "ProfileController@gallery" );
Route::get( "/newgallery/ant" , "ProfileController@ant" );
Route::get( "/newgallery/bird" , "ProfileController@bird" );
Route::get( "/newgallery/cat" , "ProfileController@cat" );

Route::resource('post', 'PostController');