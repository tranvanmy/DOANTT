<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\RateRepository;
use App\Models\Rate;

class RateEloquentRepository extends AbstractEloquentRepository implements RateRepository
{
    public $model;
    public function __construct(Rate $rate)
    {
        $this->model = $rate;
    }

    public function getRates($id, $type)
    {
        return $this->model
            ->with(['user'])
            ->where('comment_table_id', $id)
            ->where('comment_table_type', $type)
            ->all();
    }
}
