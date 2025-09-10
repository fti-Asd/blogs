<?php

namespace App\Enums;

enum UserMilitaryService: int
{
    case EXEMPT = 0;
    case INS_SERVICE = 1;
    case END_OF_SERVICE = 2;
}
