<?php

namespace MySQLite;

use DateTime;

class DateTimeFunctions {
    /**
     * Extracts the day from a date or datetime string.
     */
    public static function DAY(?string $datetime): ?int {
        if ($datetime === null) {
            return null;
        }

        $parsed = new DateTime($datetime);

        return (int) $parsed->format('d');
    }

    /**
     * Extracts the day from a date or datetime string.
     */
    public static function DAYOFMONTH(?string $datetime): ?int {
        return self::DAY($datetime);
    }

    /**
     * Returns the current date as a string in 'Y-m-d' format.
     */
    public static function CURDATE(): string {
        $now = new DateTime();
        return $now->format('Y-m-d');
    }

    /**
     * Returns the current date as a string in 'Y-m-d' format.
     */
    public static function CURRENT_DATE(): string {
        return self::CURDATE();
    }

    /**
     * Returns the current time as a string in 'H:i:s' format.
     */
    public static function CURTIME(): string {
        $now = new DateTime();
        return $now->format('H:i:s');
    }

    /**
     * Returns the current time as a string in 'H:i:s' format.
     */
    public static function CURRENT_TIME(): string {
        return self::CURTIME();
    }
    
    /**
     * Returns the current date and time as a string in 'Y-m-d H:i:s' format.
     */
    public static function CURRENT_TIMESTAMP(): string {
        return self::NOW();
    }

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