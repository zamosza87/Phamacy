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

Auth::routes();

Route::group(['middleware' => ['auth']], function () {

    //// USER
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('Profile', 'ProfileController@index')->name('Profile.index');
    Route::get('Profile/edit', 'ProfileController@edit')->name('Profile.edit');
    Route::patch('Profile/update', 'ProfileController@update')->name('Profile.update');

    /// DOC && ADMIN
    Route::group(['namespace' => 'Admin','prefix' => 'admin' , 'middleware' => ['RoleAdmin']], function () {
        Route::resources([
            'Phamacy' => 'PhamacyController',
            'Request' => 'RequestsController' ,
            'Member' => 'MemberController' ,
            'History/{user}/ht' => 'HistoryController']);
    });
    /// ADMIN
    // Route::group(['prefix' => 'Admin' , 'middleware' => ['RoleAdmin']], function () {
        ///
    // });

});







