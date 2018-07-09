<?php

namespace App\HelperFunctions;

use Illuminate\Support\Facades\Auth;

class Common
{
    public static function getCurrentLoginUserID()
    {
        return Auth::user()->id;
    }
}