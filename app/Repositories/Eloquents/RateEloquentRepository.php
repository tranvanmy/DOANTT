<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\RateRepository;
use App\Models\Rate;
use Auth;

class RateEloquentRepository extends AbstractEloquentRepository implements RateRepository
{
    public $model;
    
    public function __construct(Rate $rate)
    {
        $this->model = $rate;
    }


    public function getReceiptId($id)
    {
        return $this->model->with(['user'])->where('rate_table_id', $id)->orderBy('id', 'desc');
    }

    public function getRates($id, $type)
    {
        return $this->model
            ->with(['user'])
            ->where('comment_table_id', $id)
            ->where('comment_table_type', $type)
            ->all();
    }

    public function createRateByUser($idCooking, $pointCooking)
    {
        $rate = $this->model->where('rate_table_id', $idCooking)->where('user_id', Auth::id())->first();

        if (!isset($rate->id)) {
            $this->model->create([
                'point' => $pointCooking['point'],
                'user_id' => Auth::id(),
                'content' => $pointCooking['content'],
                'rate_table_id' => $idCooking,
                'rate_table_type' => 'cookings'
            ]);

        } else {
            $rate->point = $pointCooking['point'];
            $rate->content = $pointCooking['content'];
            $rate->save();
        }
    }
}
