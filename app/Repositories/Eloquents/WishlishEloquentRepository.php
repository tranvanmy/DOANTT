<?php

namespace App\Repositories\Eloquents;

use App\Repositories\Eloquents\AbstractEloquentRepository;
use App\Contracts\Repositories\WishlishRepository;
use App\Models\User;
use App\Models\Wishlish;
use App\Models\Cooking;

class WishlishEloquentRepository extends AbstractEloquentRepository implements WishlishRepository
{
    public $model;

    public function __construct(Wishlish $wishlish)
    {
        $this->model = $wishlish;
    }

    public function findWishlist($user_id, $cooking_id)
    {
        $wishlish = $this->model->where('user_id', $user_id)->where('cooking_id', $cooking_id)->first();

        return $wishlish;
    }

    public function listWish($id)
    {
        $wishlish = $this->model->where('user_id', $id)->with('cooking')->orderBy('id', 'DESC')->paginate('10');

        return $wishlish;
    }
}
