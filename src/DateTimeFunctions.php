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
     * Returns the current date and time as a string in 'Y-m-d H:i:s' format.
     */
    public static function NOW(): string {
        $now = new DateTime();
        return $now->format('Y-m-d H:i:s');
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