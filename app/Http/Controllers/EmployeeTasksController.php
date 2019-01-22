<?php

namespace App\Http\Controllers;

use App\Employee;
use Illuminate\Http\Request;

use App\Task;

class EmployeeTasksController extends Controller
{
    public function update(Task $task)
    {
        $task->update([
           'completed' => request()->has('completed')
        ]);

        return back();
    }

    public function store( Employee $employees)
    {
        Task::create([
            'employee_id'=>$employees->id,
            'description'=> request('description')
        ]);
        return back();
    }



}
