<?php
use App\Employee;
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
	$employees = Employee::all();
    return view('welcome')->with('employees',$employees);
    // return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth', 'Admin'])->group(function () {
	Route::get('employees', 'EmployeeController@employees')->name('employees');
	Route::get('add_employee', 'EmployeeController@add_employee')->name('add_employee');
	Route::post('store_employee', 'EmployeeController@store_employee')->name('store_employee');
	Route::get('/delete_emp/{id}','EmployeeController@delete_emp')->name('delete_emp');
	Route::get('/edit_emp/{id}','EmployeeController@edit_emp')->name('edit_emp');
	Route::post('/update_employee','EmployeeController@update_employee')->name('update_employee');
  });

Route::get('/404', 'HomeController@page_404')->name('404');

