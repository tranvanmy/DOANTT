<?php
namespace App\Repositories\Eloquents;

abstract class AbstractEloquentRepository
{
    public function make($with = null)
    {
        return $this->model->with($with);
    }

    public function all($with = [], $select = null)
    {
        return $this->make($with)->get($select);
    }

    public function paginate($paginate, $with = [], $select = null)
    {
        return $this->make($with)->paginate($paginate, $select);
    }

    public function find($id, $with = null, $select = null)
    {
        return $this->make($with)->find($id);
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }

    public function update($id, $data = [])
    {
        if ($a = $this->find($id, [], ['id'])) {
            return $a->update($data);
        }

        return false;
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function deleteItem($data = [])
    {
        return $this->model->destroy($data);
    }
    
    public function countAll()
    {
        return $this->model->all()->count();
    }

    public function getbyNumber($number, $status, $with, $orderBy)
    {
        return $this->model
            ->where('status', $status)
            ->with($with)
            ->orderBy($orderBy, 'desc')
            ->take($number)
            ->get();
    }
}
