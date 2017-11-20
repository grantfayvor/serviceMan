<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 12/11/2017
 * Time: 07:49 AM
 */

namespace App\Http\Repository;

use App\Http\Model\User;


class UserRepository extends BaseRepository
{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAllUsers()
    {
        return $this->model->where('account_type', 'User')->get();
    }

    public function getMechanics()
    {

    }
}