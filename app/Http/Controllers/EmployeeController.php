<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;


class EmployeeController extends Controller
{
    public function index() {

        $employees = Employee::orderBy('id','DESC')->paginate(5);

        return view('employee.list',['employees' => $employees]);
    }

    public function create() {
        return view('employee.create');
    }

    public function store(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
        ]);

        if ( $validator->passes() ) {

            $employee = Employee::create($request->post());

            
            if ($request->image) {
                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);
                $employee->image = $newFileName;
                $employee->save();
            }
            
            return redirect()->route('employees.index')->with('success','Employee added successfully.');


        } else {
           
            return redirect()->route('employees.create')->withErrors($validator)->withInput();
        }
    }

    public function show($employees) {

        $employee = Employee::where('id',$employees)->get();
        return view('employee.show',['employee'=> $employee]);
    }

    public function edit(Employee $employee) {
            
        return view('employee.edit',['employee' => $employee]);
    }

    public function update(Employee $employee, Request $request) {

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:employees,email',
            'image' => 'sometimes|image:gif,png,jpeg,jpg'
        ]);

        if ( $validator->passes() ) {
          

            $employee->fill($request->post())->save();

            
            if ($request->image) {
                $oldImage = $employee->image;

                $ext = $request->image->getClientOriginalExtension();
                $newFileName = time().'.'.$ext;
                $request->image->move(public_path().'/uploads/employees/',$newFileName);
                
                $employee->image = $newFileName;
                $employee->save();

                File::delete(public_path().'/uploads/employees/'.$oldImage);
            }            

            return redirect()->route('employees.index')->with('success','Employee updated successfully.');


        } else {
         
            return redirect()->route('employees.edit',$employee->id)->withErrors($validator)->withInput();
        }
    }

    public function destroy(Employee $employee, Request $request) {
                      
        File::delete(public_path().'/uploads/employees/'.$employee->image);
        $employee->delete();        
        return redirect()->route('employees.index')->with('success','Employee deleted successfully.');
    }
}
