
## MySQLite
MySQLite is a library of polyfills for the built-in SQLite driver to make it as compatible with MySQL queries as possible.

## Installation

```bash
composer require seanjohnson08/mysqlite
```

## Usage

```php
$pdo = new PDO('sqlite::memory:');

// Installs polyfilled behavior to SQLite to support MySQL builtins
MySQLite::install($pdo);

// Execute MySQL as normal
$pdo->query('SELECT MONTH(`dateField`) FROM my_table');
```

## Testing
run `composer test`