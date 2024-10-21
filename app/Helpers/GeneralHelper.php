<?php

namespace App\Helpers;

use Carbon\Carbon;

class GeneralHelper
{
    public static function timeBasedGreeting()
    {
        $hour = Carbon::now()->format('H');

        if ($hour >= 5 && $hour < 12) {
            return 'Good Morning';
        } elseif ($hour >= 12 && $hour < 17) {
            return 'Good Afternoon';
        } elseif ($hour >= 17 && $hour < 21) {
            return 'Good Evening';
        } else {
            return 'Good Night';
        }
    }
}
