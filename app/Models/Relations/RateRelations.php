<?php

namespace App\Models\Relations;

trait RateRelations
{
    public function rateTable()
    {
        return $this->morphTo();
    }
}
