<?php

namespace App\Handlers;

use Auth;

class LfmConfigHandler extends \Unisharp\Laravelfilemanager\Handlers\ConfigHandler
{
    public function userField()
    {

        switch (Auth::user()->status) {
            case config('permission.admin'):
                return '';
                break;

            default:
                return parent::userField();
                break;
        }
    }
}
