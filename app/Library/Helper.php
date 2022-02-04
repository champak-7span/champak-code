<?php

namespace App\Library;

use Carbon\Carbon;

class Helper{

    public static function generateOrderNumber()
    {
        $randomNumber = rand(1,5);
        $strtotime = strtotime(date("Y-m-d H:i:s"));
        return $strtotime.$randomNumber;
    }
}