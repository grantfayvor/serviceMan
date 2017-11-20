<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 12/11/2017
 * Time: 08:08 AM
 */

namespace App\Http\Repository;

use App\Http\Model\Reservation;

class ReservationRepository extends BaseRepository
{

    protected $model;

    public function __construct(Reservation $reservation)
    {
        $this->model = $reservation;
    }

    public function getReservationWithUser($reservationId)
    {
        return $this->model->where('id', $reservationId)->with('user')->first();
    }

    public function getMechanicReservations($mechanicId)
    {
        return $this->model->where('mechanic_id', $mechanicId)->with('user')->get();
    }
}