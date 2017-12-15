<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\DesktopController;
use DateTime;

class LivingSubstanceController extends DesktopController
{

    public static function timeago($time)
    {
        // declaring periods as static function var for future use
        static $periods = array('năm', 'tháng', 'ngày', 'giờ', 'phút', 'giây');
        // getting diff between now and time
        $now  = new DateTime('now');
        $time = new DateTime($time);
        $diff = $now->diff($time)->format('%y %m %d %h %i %s');
        // combining diff with periods
        $diff = explode(' ', $diff);
        $diff = array_combine($periods, $diff);
        // filtering zero periods from diff
        $diff = array_filter($diff);
        // getting first period and value
        $period = key($diff);
        $value  = current($diff);

        // if input time was equal now, value will be 0, so checking it
        if (!$value) {
            $period = 'giây';
            $value  = 0;
        } else {
            // converting days to weeks
            if ($period == 'ngày' && $value >= 7) {
                $period = 'tuần';
                $value  = floor($value / 7);
            }
            // adding 's' to period for human readability
        }

        // returning timeago
        return "$value $period trước";
    }

}
