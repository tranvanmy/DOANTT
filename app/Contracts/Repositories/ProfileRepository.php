<?php

namespace App\Contracts\Repositories;

use App\Contracts\Repositories\AbstractRepository;

interface ProfileRepository extends AbstractRepository
{
    public function total($id, $with = null);

    public function takePost($id, $with = null);
    
    public function takeCooking($id, $with = null);
    
    public function totalCooking($id, $with = null);

    public function takefollows($id, $with = null);

    public function takeByFollows($id, $with = null);

    public function takeMaster($paginate, $with = [], $select = null);

    public function inforFollow($id);
}
