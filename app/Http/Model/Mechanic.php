<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 13/11/2017
 * Time: 09:30 AM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Mechanic extends Model
{

    private $id;
    private $userId;
    private $status;
    private $currentReservationId;
    private $reservation_ids;
    private $numberOfReservations;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getCurrentReservationId()
    {
        return $this->currentReservationId;
    }

    /**
     * @param mixed $currentReservationId
     */
    public function setCurrentReservationId($currentReservationId)
    {
        $this->currentReservationId = $currentReservationId;
    }

    /**
     * @return mixed
     */
    public function getReservationids()
    {
        return $this->reservation_ids;
    }

    /**
     * @param mixed $reservation_ids
     */
    public function setReservationids($reservation_ids)
    {
        $this->reservation_ids = $reservation_ids;
    }

    /**
     * @return mixed
     */
    public function getNumberOfReservations()
    {
        return $this->numberOfReservations;
    }

    /**
     * @param mixed $numberOfReservations
     */
    public function setNumberOfReservations($numberOfReservations)
    {
        $this->numberOfReservations = $numberOfReservations;
    }

    /**
     * @return array
     */
    public function getAttributesArray()
    {
        return [

        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reservation()
    {
        return $this->hasMany(Reservation::class, 'reservation_ids', 'id');
    }

}