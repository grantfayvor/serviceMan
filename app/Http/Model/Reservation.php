<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 11/11/2017
 * Time: 09:57 PM
 */

namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $guarded = [];
    private $user;
    private $customerName;
    private $mechanic;
    private $mechanicName;
    private $cost;
    private $description;
    private $date;
    private $assigned;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getCustomerName()
    {
        return $this->customerName;
    }

    /**
     * @param mixed $customerName
     */
    public function setCustomerName($customerName)
    {
        $this->customerName = $customerName;
    }

    /**
     * @return mixed
     */
    public function getMechanic()
    {
        return $this->mechanic;
    }

    /**
     * @param mixed $mechanic
     */
    public function setMechanic($mechanic)
    {
        $this->mechanic = $mechanic;
    }

    /**
     * @return mixed
     */
    public function getMechanicName()
    {
        return $this->mechanicName;
    }

    /**
     * @param mixed $mechanicName
     */
    public function setMechanicName($mechanicName)
    {
        $this->mechanicName = $mechanicName;
    }


    /**
     * @return mixed
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param mixed $cost
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getAssigned()
    {
        return $this->assigned;
    }

    /**
     * @param mixed $assigned
     */
    public function setAssigned($assigned)
    {
        $this->assigned = $assigned;
    }


    public function getAttributesArray()
    {
        return [
            'user_id' => $this->user,
            'customer_name' => $this->customerName,
//            'mechanic_id' => $this->mechanic,
//            'cost' => $this->cost,
            'description' => $this->description,
            'date' => $this->date
//            'date' => date_format($this->date, "mm/dd/yyyy")
        ];
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mechanic()
    {
        return $this->belongsTo(Mechanic::class, 'mechanic_id');
    }

    /*public function jsonSerialize(){
        return [
            'customerName' => $this->customerName,
            'mechanicName' => $this->mechanicName,
            'cost' => $this->cost,
            'description' => $this->description,
            'date' => $this->date,
            'assigned' => $this->assigned
        ];
    }*/

}