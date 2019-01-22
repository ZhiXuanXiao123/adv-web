<?php

use App\Employee;
use Illuminate\Support\Facades\Input;

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
/*
GET/employees (index)
GET/employees/record (record)
GET/employees/1 (show)
POST/employees (store)
GET/employees/1/edit (edit)
PATCH/employees/1 (update)
DELETE/employees/1 (destroy)
*/


Route::get('/employees/record', 'ProjectsController@record');
Route::resource('employees', 'ProjectsController');


/*
Route::get('/employees','ProjectsController@index');
Route::get('/employees/{employees}','ProjectsController@show');
Route::post('/employees','ProjectsController@store');
Route::post('/employees/{employees}/edit','ProjectsController@edit');
Route::patch('/employees/{employees}','ProjectsController@update');
Route::delete('/employees/{employees}','ProjectsController@delete');
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::any('query', ['uses' => 'ProjectsController@query']);

Route::patch('/tasks/{task}','EmployeeTasksController@update');

Route::post('/employees/{employees}/tasks','EmployeeTasksController@store');



Route::any('/search', function () {
    $q = Input::get('q');
    $employees = Employee::where('employeename', 'LIKE', '%' . $q . '%')->orWhere('department', 'LIKE', '%' . $q . '%')->orWhere('employeeid', 'LIKE', '%' . $q . '%')->get();
    if (count($employees) > 0)
        return view('search')->withDetails($employees)->withQuery($q);
    else return view('search')->withMessage('No Details found. Try to search again !');
});
Route::get('/search', function () {
    return view('search');
});


