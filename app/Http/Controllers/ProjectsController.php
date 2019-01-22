<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Model;

use App\Employee;

class ProjectsController extends Controller
{
    public function index()
    {

        $employees = Employee::all();

        return view('projects.index', compact('employees'));
    }


    public function record()
    {
        return view('projects.record');
    }


    public function store()
    {

        request()->validate([
            'employeeid' => ['required', 'min:1', 'max:8'],
            'employeename' => ['required', 'min:3', 'max:25'],
            'department' => ['required', 'min:2']
        ]);

        $employees = new Employee();
        $employees->employeeid = request('employeeid');
        $employees->employeename = request('employeename');
        $employees->department = request('department');
        $employees->save();


        return redirect('/employees');
    }

    public function edit($id)
    {
        $employees = Employee::findOrFail($id);

        return view('projects.edit', compact('employees'));
    }

    public function update($id)
    {
        $employees = Employee::find($id);
        $employees->employeeid = request('employeeid');
        $employees->employeename = request('employeename');
        $employees->department = request('department');
        $employees->save();

        return redirect('/employees');
    }

    public function destroy($id)
    {
        Employee::find($id)->delete();
        return redirect('/employees');

    }

    public function show($id)
    {
        $employees = Employee::findOrFail($id);

        return view('projects.show', compact('employees'));

    }



}
