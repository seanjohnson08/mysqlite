<?php

namespace MySQLite;

use DateTime;

class DateTimeFunctions {
    /**
     * Returns list of arguments for sqliteCreateFunction
     * @returns array<mixed>
     */
    public static function getPolyfills(): array
    {
        return [
            ['MONTH', self::MONTH(...), 1],
            ['YEAR', self::YEAR(...), 1],
        ];
    }

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