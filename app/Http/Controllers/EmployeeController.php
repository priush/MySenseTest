<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function update(Request $request)
    {
      // echo'<pre>';print_r($request->all());exit;
      $input = $request->all();
      $validator = Validator::make($request->all(), [
        'name' => 'required',
        'email' => 'required',
        ]);
        // echo "<pre>";print_r($validatedData);exit;
        if ($validator->fails()) 
        {
          return redirect()->back()->withErrors($validator)
                            ->withInput();
        }else{

            if(!empty($input['photo'])){
              $file = $request->file('photo');
              $name = $file->getClientOriginalName(); 
              $type = $file->getClientMimeType(); 
              $destinationPath = 'public/admin/images/users';
              $targetPath = $destinationPath.'/'.$name;
              $move = $file->move($destinationPath,$file->getClientOriginalName());
            }else{
              $getImage = User::select('profile_image')->where('id', $input['user_id'] )->first();
              // dd($getImage);
              $targetPath = $getImage->profile_image;
            }

            DB::table('users')->where('id', $input['user_id'])
              ->update([
                  'name'       => $input['name'],
                  'email'       => $input['email'],
                  'location'       => !empty($input['address']) ? $input['address'] : '',
                  // 'city'       => $input['city'],
                  // 'state'       => $input['state'],
                  // 'zip_code'       => $input['zip_code'],
                  'profile_image'       => !empty($targetPath) ? $targetPath : '',
              ]);

          return redirect()->route('account_settings')->with('status', 'Settings updated Successfully!');
      }
    }


    public function employees()
    {
        $employees = Employee::all();
        return view('employees')->with('employees',$employees);
    }
    public function add_employee()
    {
        return view('add_employee');
    }
    public function store_employee( Request $request)
    {
        $input = $request->all();
        // dd($input);
        $validator = Validator::make($request->all(), [
        'empId' => 'required',
        'name' => 'required',
        'designation' => 'required',
        'doj' => 'required',
        'gender' => 'required',
        'address' => 'required',
        ]);
        if ($validator->fails()) 
        {
            return redirect()->back()->withErrors($validator)
                            ->withInput();
        }else{
        
            $emp = new Employee;
            $emp->empid = !empty($input['empId']) ? $input['empId'] : '';
            $emp->emp_name = !empty($input['name']) ? $input['name'] : ''; 
            $emp->emp_designation = !empty($input['designation']) ? $input['designation'] : ''; 
            $emp->emp_date_of_join = !empty($input['doj']) ? $input['doj'] : '';
            $emp->emp_gender = !empty($input['gender']) ? $input['gender'] : ''; 
            $emp->emp_address = !empty($input['address']) ? $input['address'] : ''; 
            $emp->save();
        return redirect()->route('employees')->with('status', 'Employee Added Successfully!');
    }
}

public function delete_emp($id){
      
  $emo = Employee::find($id);    
  $emo->delete();

  return redirect()->route('employees')->with('status', 'Employee Deleted Successfully!');
}

    public function edit_emp($id){
        $emp = Employee::find($id);  
        return view('edit_employee')->with('emp',$emp);
    }

    public function update_employee(Request $request){
    $input = $request->all();
    // dd($input);
    $validator = Validator::make($request->all(), [
        'empId' => 'required',
        'name' => 'required',
        'designation' => 'required',
        'doj' => 'required',
        'gender' => 'required',
        'address' => 'required',
      ]);
    if ($validator->fails()) 
    {
      return redirect()->back()->withErrors($validator)
                        ->withInput();
    }else{
       
    
      DB::table('employees')->where('id', $input['emp_id'])
          ->update([
              'empid'       => !empty($input['empId']) ? $input['empId'] : '',
              'emp_name'      => !empty($input['name']) ? $input['name'] : '',
              'emp_designation'   => !empty($input['designation']) ? $input['designation'] : '',
              'emp_date_of_join'   => !empty($input['doj']) ? $input['doj'] : '',
              'emp_gender'        => !empty($input['gender']) ? $input['gender'] : '',
              'emp_address'        => !empty($input['address']) ? $input['address'] : '',
               ]);
      return redirect()->route('employees')->with('status', 'Employee updated Successfully!');
    }
  }
 
}
