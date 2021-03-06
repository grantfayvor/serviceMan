<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 12/11/2017
 * Time: 11:04 AM
 */

namespace App\Http\Controllers;

use App\Http\Service\ReservationService;
use App\Http\Service\UserService;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    private $service;
    private $userService;

    public function __construct(ReservationService $reservationService, UserService $userService)
    {
        $this->service = $reservationService;
        $this->userService = $userService;
    }

    public function create(Request $request)
    {
        return $this->service->create($request);
    }

    public function getAllReservations()
    {
        return $this->service->getAll();
    }

    public function getAll(Request $request)
    {
        return $this->service->getUserReservation($request->user()->id);
    }

    public function getAllSystemReservations()
    {
        return $this->service->getAll();
    }

    public function getByParam(Request $request)
    {
        $param = $request->param;
        $value = $request->value;
        return $this->service->getByParam($param, $value);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->service->getById($id);
    }

    public function update(Request $request)
    {
        return $this->service->update($request);
    }

    public function delete(Request $request)
    {
        return $this->service->delete($request->id);
    }

    public function getOpenReservations(Request $request)
    {
        $user = $request->user();
        return "Mechanic" == $user->account_type || "Admin" == $user->account_type
            ? $this->service->getByParam("assigned", false)
            : response()->json(['message' => 'not allowed to perform this operation'], 403);
    }

    public function getMechanicReservations(Request $request)
    {
        return "Mechanic" == $request->user()->account_type
            ? $this->service->getMechanicReservations($request->session()->get('mechanicId'))
            : response()->json(['message' => 'not allowed to perform this operation'], 403);
    }

    public function acceptReservation(Request $request)
    {
        $mechanic = $this->userService->getByPhoneNumber($request->input('From') ?: $request->input('from'));
//        $user = $request->user();
        return $this->service->setReservationMechanic($mechanic, $request);
//        return "Mechanic" == $mechanic->account_type
//            ? $this->service->setReservationMechanic($mechanic, $request)
//            : response()->json(['message' => 'not allowed to perform this operation', 'data' => $mechanic], 403);
    }

    public function declineReservation(Request $request)
    {
        $user = $request->user();
        return "Mechanic" == $user->account_type
            ? $this->service->removeReservationMechanic($request)
            : response()->json(['message' => 'not allowed to perform this operation'], 403);
    }

}