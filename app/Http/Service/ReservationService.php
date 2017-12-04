<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 12/11/2017
 * Time: 08:11 AM
 */

namespace App\Http\Service;


use App\Http\Model\Mechanic;
use App\Http\Model\Reservation;
use App\Http\Repository\MechanicRepository;
use App\Http\Repository\ReservationRepository;
use App\Mail\MechanicAcceptMail;
use App\Mail\MechanicRejectMail;
use App\Mail\ToMechanicsMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ReservationService
{

    private $repository;
    private $reservation;
    private $userService;
    private $twilioService;

    public function __construct(ReservationRepository $repository, Reservation $reservation, UserService $userService, TwilioService $twilioService)
    {
        $this->repository = $repository;
        $this->reservation = $reservation;
        $this->userService = $userService;
        $this->twilioService = $twilioService;
    }

    public function getUserReservation($userId)
    {
        $result = $this->repository->getByParam('user_id', $userId);
        return $result
            ? $result
            : response()->json(['message' => 'the resource you requested was not found']);
    }

    public function getMechanicReservations($mechanicId)
    {
        $result = $this->repository->getMechanicReservations($mechanicId);
        return $result
            ? $result
            : response()->json(['message' => 'the resource you requested was not found']);
    }

    /**
     * @param $n
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAll()
    {
        if (!$this->repository->getAll()) {
            return response()->json(['message' => 'the resource you requested was not found']);
        }
        return $this->repository->getAll();
    }

    /**
     * @param $param
     * @param $value
     * @return mixed
     */
    public function getByParam($param, $value)
    {
        if (!$this->repository->getByParam($param, $value)) {
            return response()->json(['message' => 'the resource you requested was not found']);
        }
        return $this->repository->getByParam($param, $value);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getById($id)
    {
        if (!$this->repository->getById($id)) {
            return response()->json(['message' => 'the resource you requested was not found']);
        }
        return $this->repository->getById($id);
    }

    public function create(Request $request)
    {
        $user = $request->user();
        $description = $request->description;
        $cost = $request->cost;
        $date = $request->date;
        $location = $request->location ? $request->location : $request->session()->get('location');
        $customerName = $user->last_name . " " . $user->first_name;
        $this->reservation->setUser($user->id);
        $this->reservation->setCustomerName($customerName);
        $this->reservation->setDescription($description);
        $this->reservation->setCost($cost);
        $this->reservation->setDate($date);
        $this->reservation->setLocation($location);
        $reservation = $this->repository->create($this->reservation->getAttributesArray());
        if (!$reservation) {
            return response()->json(['message' => 'the resource was not created', 'data' => $this->reservation->getAttributesArray()], 500);
        }
        $mechanics = $this->userService->getMechanics();
        $nearbyMechanics = $this->classify($location, $mechanics);
        if(count($nearbyMechanics) !== 0) {
            $this->twilioService->notifyThroughSms($nearbyMechanics, 'Reply with ' .$reservation->id .'to accept a request at ' .$location);
        } else {
            $mechanicPhoneNumbers = $mechanics->pluck('phone_number'); /*array_column($mechanics, 'phone_number');*/
            $this->twilioService->notifyThroughSms($mechanicPhoneNumbers, 'There is a customer waiting for your response at ' .$location);
        }
        return response()->json(['message' => 'the resource was successfully created', 'data' => $this->reservation->getAttributesArray()], 200);
    }

    public function update(Request $request)
    {
        $reservationId = $request->id;
        $description = $request->description;
        $date = $request->date;
        $reservationUpdate = [
            'description' => $description,
            'date' => $date
        ];
        if (!$this->repository->update($reservationId, $reservationUpdate)) {
            return response()->json(['message' => 'the resource was not updated', 'data' => $this->reservation->getAttributesArray()], 500);
        }
        return response()->json(['message' => 'the resource was successfully updated', 'data' => $this->reservation->getAttributesArray()], 200);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete($id)
    {
        if (!$this->repository->delete($id)) {
            return response()->json(['message' => 'the resource was not deleted']);
        }
        return response()->json(['message' => 'the resource was successfully deleted']);
    }

    public function setReservationMechanic($mechanic, Request $request)
    {
//        $mechanic = $this->userService->getByUsername($request->from);
//        $mechanic = $this->userService->getByPhoneNumber($request->input('From') ?: $request->input('from'));
        $mechanicDetails = [
            'mechanic_id' => $mechanic->id,
            'mechanic_name' => $mechanic->last_name . " " . $mechanic->first_name,
            'assigned' => true
        ];
        if (!$this->repository->update($request->input('Body') ?: $request->input('body'), $mechanicDetails)) {
            return response()->json(['message' => 'the resource was not updated', 'data' => $mechanic], 500);
        }
        if (isset($mechanic->account_type) && !$mechanic->account_type == "Mechanic") {
            return response()->json(['message' => 'you are not allowed to perform this operation'], 403);
        }
        $reservationUser = $this->repository->getReservationWithUser(trim($request->body));
        $this->twilioService->receiveReply($request);
        $this->twilioService->notifyThroughSms([$reservationUser->user->phone_number], 'Dear ' .$reservationUser->customer_name .'. '
            .'Your request for a mechanic has been accepted by ' .$mechanic['mechanic_name']);
        return response()->json(['message' => 'the resource was successfully updated', 'data' => $mechanic], 200);
    }

    public function removeReservationMechanic(Request $request)
    {
        $reservationId = $request->reservationId;
        $mechanicId = $request->mechanicId;
        $customerEmail = $request->customerEmail;
        if ($request->session()->get('mechanicId') == $mechanicId) {
            $update = [
                'mechanic_id' => null,
                'mechanic_name' => null,
                'assigned' => false
            ];
            if (!$this->repository->update($reservationId, $update)) {
                return response()->json(['message' => 'the resource was not updated', 'data' => $update], 500);
            }
            Mail::to($customerEmail)->queue(new MechanicRejectMail());
            return response()->json(['message' => 'the resource was successfully updated', 'data' => $update], 200);
        } else {
            return response()->json(['message' => 'not allowed to perform this operation'], 403);
        }
    }

    public function classify($userLocation, $mechanics)
    {
        $userLocationSplit = preg_split('[ ]', $userLocation);
        $countOfUserLocationSplit = count($userLocationSplit);
        $nearbyMechanics = array();
        foreach ($mechanics as $mechanic) {
            $mechanicLocationSplit = preg_split('[ ]', $mechanic->location);
            $countOfMechanicLocationSplit = count($mechanicLocationSplit);
            for ($i = $countOfMechanicLocationSplit; $i > 0; $i--) {
                for ($j = $countOfUserLocationSplit; $j > 0; $j--) {
                    $firstTextToCompare = preg_replace('/[ .,]+/', '', trim($userLocationSplit[$j - 1]));
                    $secondTextToCompare = preg_replace('/[ .,]+/', '', trim($mechanicLocationSplit[$i - 1]));
                    if (strcasecmp($firstTextToCompare, $secondTextToCompare)  === 0) {
//                        array_push($nearbyMechanics, $mechanic->user->email);
                        array_push($nearbyMechanics, $mechanic->user->phone_number);
                        break;
                    }
                }
            }
        }
        return $nearbyMechanics;
    }
}