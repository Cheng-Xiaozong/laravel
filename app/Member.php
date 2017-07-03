<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Member extends Authenticatable
{
    public static function getMember()
    {
        return '我是 member';
    }
}
