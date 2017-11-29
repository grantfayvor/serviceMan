<?php
namespace App\Http\Service;

use App\Http\Model\User;
use App\Http\Repository\MechanicRepository;
use App\Http\Repository\UserRepository;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserService
{

    private $repository;
    private $mechanicRepository;
    private $user;

    public function __construct(UserRepository $userRepository, User $user, MechanicRepository $mechanicRepository)
    {
        $this->repository = $userRepository;
        $this->user = $user;
        $this->mechanicRepository = $mechanicRepository;
    }

    public function authenticate($username, $password)
    {
        return Auth::attempt(['username' => $username, 'password' => $password]);
    }

    public function register(Request $request)
    {
        $username = $request->username;
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $password = $request->password;
        $email = $request->email;
        $phoneNumber = $request->phoneNumber;
        $identificationNumber = $request->identificationNumber;
        $photo = $request->file('photo');
        $imageLocation = "profile/" . $username . ".jpg";
        $this->user->setFirstName($firstName);
        $this->user->setLastName($lastName);
        $this->user->setUsername($username);
        $this->user->setEmail($email);
        $this->user->setPhoneNumber($phoneNumber);
        $this->user->setPhoto($photo);
        $this->user->setImageLocation($imageLocation);
        $this->user->setAccountType("User");
        $this->user->setIdentificationNumber($identificationNumber);
        $this->user->setPassword(Hash::make($password));
        Storage::disk('profile')->putFileAs('', $this->user->getPhoto(), $this->user->getImageLocation());
        return $this->repository->create($this->user->getAttributesArray());
//        return $user->attributesToArray();
    }

    public function newAdmin(Request $request)
    {
        $username = $request->username;
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $password = $request->password;
        $email = $request->email;
        $phoneNumber = $request->phoneNumber;
        $identificationNumber = $request->identificationNumber;
        $photo = $request->file('photo');
        $imageLocation = "profile/admin/" . $username . ".jpg";
        $this->user->setFirstName($firstName);
        $this->user->setLastName($lastName);
        $this->user->setUsername($username);
        $this->user->setEmail($email);
        $this->user->setPhoneNumber($phoneNumber);
        $this->user->setPhoto($photo);
        $this->user->setImageLocation($imageLocation);
        $this->user->setAccountType("Admin");
        $this->user->setIdentificationNumber($identificationNumber);
        $this->user->setPassword(Hash::make($password));
        Storage::disk('profile')->putFileAs('', $this->user->getPhoto(), $this->user->getImageLocation());
        return $this->repository->create($this->user->getAttributesArray());
//        return $user->attributesToArray();
    }

    public function newMechanic (Request $request)
    {
        $username = $request->username;
        $firstName = $request->firstName;
        $lastName = $request->lastName;
        $password = $request->password;
        $email = $request->email;
        $phoneNumber = $request->phoneNumber;
        $identificationNumber = $request->identificationNumber;
        $photo = $request->file('photo');
        $imageLocation = "profile/" . $username . ".jpg";
        $this->user->setFirstName($firstName);
        $this->user->setLastName($lastName);
        $this->user->setUsername($username);
        $this->user->setEmail($email);
        $this->user->setPhoneNumber($phoneNumber);
        $this->user->setPhoto($photo);
        $this->user->setImageLocation($imageLocation);
        $this->user->setAccountType("Mechanic");
        $this->user->setIdentificationNumber($identificationNumber);
        $this->user->setPassword(Hash::make($password));
        Storage::disk('profile')->putFileAs('', $this->user->getPhoto(), $this->user->getImageLocation());
        $mechanic = [
            'user_id' => $this->repository->create($this->user->getAttributesArray()),
            'location' => $request->address
        ];
        return $this->mechanicRepository->create($mechanic);
    }

    public function getAllUsers()
    {
        return $this->repository->getAllUsers();
    }

    public function getAllAdmins()
    {
        return $this->repository->getByParam('account_type', 'Admin');
    }

    public function getMechanics()
    {
        return $this->mechanicRepository->getMechanics();
    }

    public function getMechanicByUserId($userId)
    {
        return $this->mechanicRepository->getMechanicByUserId($userId);
    }

    public function deleteUser($userId)
    {
        return $this->repository->delete($userId);
    }

    public function deleteMechanic($userId)
    {
        return $this->repository->delete($userId); //if this operation doesn't cascade then first delete from the mechanics table
    }

    public function logout()
    {
        Auth::logout();
    }

}