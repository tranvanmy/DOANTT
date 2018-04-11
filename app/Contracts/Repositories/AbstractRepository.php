<?php

namespace App\Contracts\Repositories;

interface AbstractRepository
{
    public function make($with);

    public function all();

    public function paginate($paginate, $with = [], $select = null);

    public function paginateOrder($paginate, $orderby = null, $with = [], $select = null);

    public function find($id, $with = null, $select = null);

    public function create($data = []);

    public function update($id, $data = []);

    public function delete($id);

    public function countAll();

    public function getbyNumber($number, $status, $with, $orderBy);
}
