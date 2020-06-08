<?php

use Illuminate\Support\Facades\Route;

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
    return view('index');
});

Route::post('login', 'LoginController@loginPost');

Route::get('logout', 'LoginController@logout');

Route::get('/dashboard', 'DashboardController@index');

//Users
Route::prefix('user')->group(function(){
    
    Route::get('', 'UserController@index');

    Route::get('add', 'UserController@add');
    
    Route::post('store', 'UserController@store');
    
    Route::get('edit/{user_code}', 'UserController@edit');
    
    Route::post('update', 'UserController@update');
    
    Route::delete('delete/{user_code}/{img}', 'UserController@delete');
});

Route::prefix('book')->group(function(){

    Route::get('', 'BookController@index');

    Route::get('add', 'BookController@add');
    
    Route::post('store', 'BookController@store');

    Route::get('detail/{book_code}', 'BookController@detail');
    
    Route::get('edit/{book_code}', 'BookController@edit');
    
    Route::post('update', 'BookController@update');
    
    Route::delete('delete/{book_code}/{img}', 'BookController@delete');
});

Route::prefix('book-category')->group(function(){

    Route::get('', 'CategoryController@index');

    Route::get('add', 'CategoryController@add');
    
    Route::post('store', 'CategoryController@store');
    
    Route::get('edit/{id_category}', 'CategoryController@edit');
    
    Route::post('update', 'CategoryController@update');
    
    Route::delete('delete/{id_category}', 'CategoryController@delete');
});

Route::prefix('role')->group(function(){

    Route::get('', 'RoleController@index');

    Route::get('add', 'RoleController@add');
    
    Route::post('store', 'RoleController@store');
    
    Route::get('edit/{id_role}', 'RoleController@edit');
    
    Route::post('update', 'RoleController@update');
    
    Route::delete('delete/{id_role}', 'RoleController@delete');
});

Route::prefix('fine-type')->group(function(){

    Route::get('', 'FineTypeController@index');

    Route::get('add', 'FineTypeController@add');
    
    Route::post('store', 'FineTypeController@store');
    
    Route::get('edit/{id_fine_type}', 'FineTypeController@edit');
    
    Route::post('update', 'FineTypeController@update');
    
    Route::delete('delete/{id_fine_type}', 'FineTypeController@delete');
});