<?php

namespace MySQLite;

use DateTime;

class DateTimeFunctions {
    /**
     * Extracts the month from a date or datetime string.
     */
    public static function MONTH(?string $datetime): ?int {
        if ($datetime === null) {
            return null;
        }

        $parsed = new DateTime($datetime);

        return (int) $parsed->format('m');
    }
    
    /**
     * Extracts the year from a date or datetime string.
     */
    public static function YEAR(?string $datetime): ?int {
        if ($datetime === null) {
            return null;
        }

        $parsed = new DateTime($datetime);

        return (int) $parsed->format('Y');
    }
}