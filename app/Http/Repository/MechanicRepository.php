<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 14/11/2017
 * Time: 04:26 PM
 */

namespace App\Http\Repository;


use App\Http\Model\Mechanic;

class MechanicRepository extends BaseRepository
{

    protected $model;

    public function __construct(Mechanic $mechanic)
    {
        $this->model = $mechanic;
    }

    public function getMechanics()
    {
        return $this->model->with('user')->get();
    }

    public function getMechanicByUserId($userId)
    {
        return $this->model->where('user_id', $userId)->first();
    }
}