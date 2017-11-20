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

//app views
Route::get('/', 'Controller@index')->name('index');
Route::get('/dashboard', 'MainController@dashboard')->name('dashboard');
Route::get('/login', function(){ return view('login'); })->name('login');
Route::get('/register', function(){ return view('register'); })->name('register');
Route::get('/make-reservation', 'MainController@makeReservation')->name('new_reservation');
Route::get('/my-reservations', 'MainController@myReservations')->name('my_reservations');
Route::get('/open-reservations', 'MainController@openReservations')->name('open_reservations');
Route::get('/users', 'MainController@allUsers')->name('users');
Route::get('/mechanics', 'MainController@allMechanics')->name('mechanics');
Route::get('/admins', 'MainController@allAdmins')->name('admins');
Route::get('/add-mechanic', 'MainController@newMechanic');
Route::get('/add-admin', 'MainController@newAdmin');
Route::get('/reservations', 'MainController@allReservations');


/*app apis*/

//user apis
Route::post('/api/user/register', 'UserController@register')->name('user-register');
Route::post('/api/user/authenticate', 'UserController@login')->name('authenticate');
Route::put('/api/user/setLocation', 'UserController@setLocation');
//Route::get('/api/user/getLocation', 'UserController@getLocation');
Route::get('/api/users', 'UserController@getAllUsers');
Route::get('/api/mechanics', 'UserController@getAllMechanics');
Route::get('/api/admins', 'UserController@getAllAdmins');
Route::delete('/api/user/delete', 'UserController@deleteUser');
Route::delete('/api/mechanic/delete', 'UserController@deleteMechanic');
Route::get('/logout', 'UserController@logout');
Route::get('/api/user', 'UserController@getActiveUser');
Route::post('/api/mechanic/create', 'UserController@newMechanic');
Route::post('/api/admin/create', 'UserController@newAdmin');

//reservation apis
Route::get('/api/reservations', 'ReservationController@getAll')->name('reservations');
Route::post('/api/reservation/create', 'ReservationController@create');
Route::get('api/reservation/get', 'ReservationController@getById');
Route::get('api/reservation/find', 'Reservation@getByParam');
Route::put('/api/reservation/update', 'ReservationController@update');
Route::delete('/api/reservation/delete', 'ReservationController@delete');
Route::get('/api/reservations/open', 'ReservationController@getOpenReservations');
Route::get('/api/reservations/mechanic', 'ReservationController@getMechanicReservations');
Route::put('/api/reservation/accept', 'ReservationController@acceptReservation');
Route::get('/api/reservations/all', 'ReservationController@getAllReservations');
Route::put('/api/reservation/decline', 'ReservationController@declineReservation');
Route::get('/api/all-reservations', 'ReservationController@getAllSystemReservations');

//user activity apis
Route::get('/api/activity', 'ActivityController@getUserActivityLog');

