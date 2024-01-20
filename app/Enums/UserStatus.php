<?php

namespace App\Enums;

enum UserStatus:string{
    case Active ='active';
    case InActive ='inactive';
    case Banned ='banned';
}
