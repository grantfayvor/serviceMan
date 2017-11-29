<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 11/11/2017
 * Time: 09:57 PM
 */

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $guarded = [];
    private $id;
    private $firstName;
    private $lastName;
    private $username;
    private $email;
    private $phoneNumber;
    private $password;
    private $accountType;
    private $imageLocation;
    private $photo;
    private $identificationNumber;

    /*public function __construct($firstName, $lastName, $username, $password){
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->username = $username;
        $this->password = $password;
    }*/

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * @param mixed $phoneNumber
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getAccountType()
    {
        return $this->accountType;
    }

    public function setAccountType($accountType)
    {
        $this->accountType = $accountType;
    }

    public function getImageLocation()
    {
        return $this->imageLocation;
    }

    public function setImageLocation($imageLocation)
    {
        $this->imageLocation = $imageLocation;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    /**
     * @return mixed
     */
    public function getIdentificationNumber()
    {
        return $this->identificationNumber;
    }

    /**
     * @param mixed $identificationNumber
     */
    public function setIdentificationNumber($identificationNumber)
    {
        $this->identificationNumber = $identificationNumber;
    }

    public function getAttributesArray()
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'username' => $this->username,
            'email' => $this->email,
            'phone_number' => $this->phoneNumber,
            'password' => $this->password,
            'account_type' => $this->accountType,
            'image_location' => $this->imageLocation,
            'identification_number' => $this->identificationNumber
        ];
    }

    /*public function jsonSerialize()
    {
        return [
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $this->password
        ];
    }*/

}