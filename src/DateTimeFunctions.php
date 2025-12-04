<?php

namespace MySQLite;

use DateTime;

class DateTimeFunctions {
    public static function MONTH(?string $datetime): ?int {
        if ($datetime === null) {
            return null;
        }

        $parsed = new DateTime($datetime);

        return (int) $parsed->format('m');
    }
    
    public static function YEAR(?string $datetime): ?int {
        if ($datetime === null) {
            return null;
        }

        $parsed = new DateTime($datetime);

        return (int) $parsed->format('Y');
    }
}