<?php
/**
 * Created by PhpStorm.
 * User: Harrison Favour
 * Date: 11/12/2017
 * Time: 07:06 AM
 */

namespace App\Http\Repository;


abstract class BaseRepository
{
    protected $model;

    /**
     * @param array $fields
     * @return mixed
     */
    public function getAll(array $fields = null)
    {
        if ($fields != null) {
            return $this->model->all($fields);
        }
        return $this->model->all();
    }

    public function getByParam($param, $value)
    {
        return $this->model->where($param, $value)->get();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $id
     * @param array $fields
     * @return mixed
     */
    public function update($id, array $fields)
    {
        return $this->model->where('id', $id)->update($fields);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

    /**
     * @param array $object
     * @return mixed
     */
    public function create(array $object)
    {
        return $this->model->create($object);
    }


}