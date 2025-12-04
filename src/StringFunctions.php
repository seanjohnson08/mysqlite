<?php

namespace MySQLite;

class StringFunctions {
    /**
     * Extracts the month from a date or datetime string.
     * 
     * @param array<int|float|string|null> $values
     */
    public static function CONCAT(...$values): ?string {
        $result = '';
        foreach ($values as $value) {
            if ($value === null) {
                return null;
            }
            $result .= (string) $value;
        }
        return $result;
    }
}