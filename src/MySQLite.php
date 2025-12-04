<?php

namespace MySQLite;

use Error;
use PDO;

class MySQLite {
    public static function install(PDO $pdo) {
        if (!self::hasSQLiteDriver($pdo)) {
            throw new Error('Cannot install MySQLite: sqlite driver not supported');
        }

        $polyfills = [
            ...DateTimeFunctions::getPolyfills(),
        ];

        array_map(static fn($args) => $pdo->sqliteCreateFunction(...$args), $polyfills);
    }

    public static function hasSQLiteDriver(PDO $pdo) {
        $drivers = $pdo->getAvailableDrivers();
        return in_array('sqlite', $drivers);
    }
}