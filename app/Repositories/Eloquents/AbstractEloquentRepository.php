<?php
namespace App\Repositories\Eloquents;

abstract class AbstractEloquentRepository
{
    public function make($with)
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
        return $this->make($with)->find($id, $select);
    }

    public function create($data = [])
    {
        return $this->model->create($data);
    }

    public function update($id, $data = [])
    {
        return $this->find($id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }
}
