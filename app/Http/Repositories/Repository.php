<?php
namespace App\Http\Repositories;

use App\Http\Repositories\RepositoryInterface;

abstract class Repository implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = app()->make(
            $this->getModel()
        );
    }

    public function getAll()
    {
        return $this->model->query()->latest('id')->get();
    }

    public function getAllWithRelations($relations  = [])
    {
        return $this->model->with($relations)->get();
    }

    public function getWithRelationId($id, $relations  = [])
    {
        return $this->model->with($relations)->find($id);
    }

    public function getPaginate($perPage)
    {
        return $this->model->query()->latest('id')->paginate($perPage);
    }

    public function findOrFail($id)
    {
        $result = $this->model->findOrFail($id);

        return $result;
    }

    public function create($attributes = [])
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes = [])
    {
        $result = $this->findOrFail($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($id)
    {
        $result = $this->findOrFail($id);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }
}
