<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::orderBy('id','desc')->paginate(4);
        return view('index', compact('employees'));
    }   

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    
    $request->validate([
        'name1' => 'required',
        // 'email' => 'required|unique:employee,email',
        'joining_date' => 'required',
        'salary' => 'required',
        'is_active' => 'required'
    ]);

    $data = $request->except('_token');
    Employee::create($data);
    return redirect()->route('employee.index')
    ->withMessage('Employee has been created successfully');

       //Employee::create($data);
    //    dd('sucessfully created');
       
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $employee = Employee::find($id);
        return view('show', compact ('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::find($id);
        // dd($employee);
        return view('edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
// 

public function update(Request $request, Employee $employee)
{
    // $request->validate([
    //     'name1' => 'required',
    //     'email' => 'required|unique:employees,email,' . $employee->id . '|email',
    //     'joining_date' => 'required',
    //     'salary' => 'required',
    //     'is_active' => 'required|boolean',
    // ]);

    $data = $request->all();
    $employee->update($data);

    return redirect()->route('employees.edit', $employee->id)
        ->withMessage('Employee has been updated successfully');
}


// 
    // public function update(Request $request, Employee $employee)
    // {
         
    // $request->validate([
    //     'name1' => 'required',
    //     'email' => 'required|unique:employees,email,'.$employee->id.'|email',
    //     'joining_date' => 'required',
    //     'salary' => 'required',
    //     'is_active' => 'required'
    // ]);
    //     // dd($employee);
    //     // dd($request->all());
    //     $data = $request->all();
    //     // $employee = Employee::find($id);
    //     $employee->update($data);
    //     // dd('successfull updated');
    //     return redirect()->route('employees.edit',$employee->id)
    //     ->withMessage('Employee has been updated successfully');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()-> route('employee.index')
        ->withMessage('Employee delted successfully');
        // dd($employee);    
    }
}
