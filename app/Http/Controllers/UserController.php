<?php
namespace App\Http\Controllers;

use App\Http\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
//        return response()->json(array('result' => $this->userService->authenticate($username, $password)));
        if ($this->userService->authenticate($username, $password)) {
            $user = Auth::user();
            if ("Mechanic" == $user->account_type) {
                $mechanic = $this->userService->getMechanicByUserId($user->id);
                $request->session()->put('mechanicId', $mechanic->id);
            }
            return redirect()->intended('/dashboard');
        } else {
            return back()->withInput();
        }
    }

    public function register(Request $request)
    {
        /*$username = $request->username;
        $password = $request->password;
        if ($this->userService->register($request) && $this->userService->authenticate($username, $password)) {
            $user = Auth::user();
            if("Mechanic" == $user->account_type){
                $mechanic = $this->userService->getMechanicByUserId($user->id);
                $request->session()->put('mechanicId', $mechanic->id);
            }
            return redirect()->intended('/dashboard');
        } else {
            return back()->withInput();
//            return response()->json(array("result" => false));
        }*/
        if ($this->userService->register($request)) {
            return back()->with(['message' => 'you have successfully registered and your account will be verified as soon as possible']);
        } else {
            return back()->withInput()->setContent('error creating the account');
        }
    }

    public function setLocation(Request $request)
    {
        $location = $request->location;
//        if($location){
        $request->session()->put('location', $location);
//        }
    }

    public function getLocation(Request $request)
    {
        return $request->session()->get('location');
    }

    public function getAllUsers(Request $request)
    {
        if ("Admin" == $request->user()->account_type) {
            return $this->userService->getAllUsers();
        } else {
            return response()->json(['message' => 'not permitted to perform this operation'], 403);
        }
    }

    public function getAllAdmins(Request $request)
    {
        if ("Admin" == $request->user()->account_type) {
            return $this->userService->getAllAdmins();
        } else {
            return response()->json(['message' => 'not permitted to perform this operation'], 403);
        }
    }

    public function getAllMechanics(Request $request)
    {
        if ("Admin" == $request->user()->account_type) {
            return $this->userService->getMechanics();
        } else {
            return response()->json(['message' => 'not permitted to perform this operation'], 403);
        }
    }

    public function deleteUser(Request $request)
    {
        if ("Admin" == $request->user()->account_type) {
            $userId = $request->id;
            return $this->userService->deleteUser($userId);
        } else {
            return response()->json(['message' => 'not permitted to perform this operation'], 403);
        }
    }

    public function newAdmin(Request $request)
    {
        if ("Admin" == $request->user()->account_type) {
            return $this->userService->newAdmin($request);
        } else {
            return response()->json(['message' => 'not permitted to perform this operation'], 403);
        }
    }

    public function newMechanic(Request $request)
    {
        return $this->userService->newMechanic($request);
    }

    public function deleteMechanic(Request $request)
    {
        if ("Admin" == $request->user()->account_type) {
            $userId = $request->id;
            return $this->userService->deleteMechanic($userId);
        } else {
            return response()->json(['message' => 'not permitted to perform this operation'], 403);
        }
    }


    public function getActiveUser(Request $request)
    {
        $user = $request->user();
        return response($user->first_name . " " . $user->last_name);
    }

    public function logout()
    {
        $this->userService->logout();
        return redirect('/login');
    }
}
