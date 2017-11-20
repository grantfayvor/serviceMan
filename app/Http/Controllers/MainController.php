<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class MainController extends Controller
{
    private $institutionService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/dashboard', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        elseif ("Mechanic" == $type) return view('mechanic/dashboard', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return view('dashboard', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
    }

    public function allUsers(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/users', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }

    public function allMechanics(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/mechanics', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }

    public function allAdmins(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/admins', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }

    public function allReservations(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/reservations', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }

    public function newAdmin(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/new-admin', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }

    public function newMechanic(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/new-mechanic', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else/*if ("Mechanic" == $type)*/ return view('mechanic/new-mechanic', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
//        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }

    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }

    public function makeReservation(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Admin" == $type) return view('admin/new-reservation', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        elseif ("User" == $type) return view('new-reservation', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }

    public function myReservations(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Mechanic" == $type) return view('mechanic/my-reservations', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        elseif ("Admin" == $type) return view('admin/my-reservations', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return view('reservations', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
    }

    public function openReservations(Request $request)
    {
        $type = $request->user()->account_type;
        if ("Mechanic" == $type) return view('mechanic/open-reservations', ['username' => Auth::user()->username, 'accountType' => Auth::user()->account_type, 'photo' => Auth::user()->image_location]);
        else return response()->json(['message' => 'not authorized to perform this transaction'], 403);
    }
}
