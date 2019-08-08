<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use App\Employee;
//use App\PositionModel;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        //$this->middleware('auth');
        //$this->middleware('role:admin,account');
    }


    public function index(Request $request)
    {
        //GET KEYWORD FROM URL
        $q = $request->input('q');

        //METHOD : 1
        if(!empty($q)){ //NOT EMPTY = HAVE SOME KEYWORD in $q
            $employees = Employee::search($q);
        }else{
            $employees = Employee::getAll();
        }

        //METHOD : 2
        //$employees = ( !empty($q) ) ? Employee::search($q) : Employee::getAll();

        //PACK DATA
        $data = [
          "employees" => $employees ,
          "q" => $q,                    //send $q to display in view
        ];

        //DISPLAY IN VIEW
        return view('employee/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $table_position = PositionModel::select_all();
        $data = [
            "table_position" => $table_position
        ];
        return view('employee/create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->input('name');
        $age = $request->input('age');
        $address = $request->input('address');
        $salary = $request->input('salary');
        $position_id = $request->input('position_id');
     	$path = $request->file('image')->store('avatar','public');
    //$path = Storage::putFile('avatar', $request->file('img'));

    echo $path;
        //EmployeeModel::insert($name, $age, $address, $salary, $position_id);

        //return redirect('/employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = [
            "employee" => Employee::getItem($id) ,
        ];
        return view('employee/show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table_employee = EmployeeModel::select_by_id($id);
        $table_position = PositionModel::select_all();
        $data = [
            'table_employee' => $table_employee,
            'table_position' => $table_position
        ];
        return view('employee/edit',$data);
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
        $name = $request->input('name');
        $age = $request->input('age');
        $address = $request->input('address');
        $salary = $request->input('salary');
        $position_id = $request->input('position_id');

        EmployeeModel::update_by_id($name, $age, $address, $salary, $position_id, $id);

        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        EmployeeModel::delete_by_id($id);
        return redirect('/employee');
    }

    public function download($filename){
      return Storage::download("public/$filename");
    }
}
