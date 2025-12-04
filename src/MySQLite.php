<?php

namespace MySQLite;

use Error;
use PDO;

class MySQLite {
    public static function install(PDO $pdo) {
        if (!self::hasSQLiteDriver($pdo)) {
            throw new Error('Cannot install MySQLite: sqlite driver not supported');
        }

        $extensions = [DateTimeFunctions::class];

        foreach (self::getPolyfills($extensions) as $args) {
            $pdo->sqliteCreateFunction(...$args);
        }
    }

    public static function hasSQLiteDriver(PDO $pdo) {
        return in_array('sqlite', $pdo->getAvailableDrivers());
    }

    private static function getPolyfills(array $extensions): \Generator
    {
        foreach ($extensions as $className) {
            $reflection = new \ReflectionClass($className);
            $methods = $reflection->getMethods(\ReflectionMethod::IS_STATIC | \ReflectionMethod::IS_PUBLIC);

            foreach ($methods as $method) {
                $name = $method->getName();
                $argsCount = $method->getNumberOfParameters();

                yield [$name, [$className, $name], $argsCount];
            }
        }
    }
}