<?php

use MySQLite\DateTimeFunctions;
use MySQLite\MySQLite;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateTimeFunctions::class)]
class DateTimeFunctionsTest extends TestCase {
    private PDO $pdo;

    public function setUp(): void
    {
        parent::setUp();
        $this->pdo = new PDO('sqlite::memory:');
        MySQLite::install($this->pdo);
    }

    public function testMonthDateTime() {
        $result = $this->pdo->query(<<<SQL
            SELECT MONTH("2025-12-04 10:47:00")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 12);
    }

    public function testMonthDate() {
        $result = $this->pdo->query(<<<SQL
            SELECT MONTH("2025-12-04")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 12);
    }

    public function testMonthNull() {
        $result = $this->pdo->query(<<<SQL
            SELECT MONTH(NULL)
        SQL);

        $this->assertNull($result->fetchColumn(0));
    }

    public function testYearDateTime() {
        $result = $this->pdo->query(<<<SQL
            SELECT YEAR("2025-12-04 10:47:00")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 2025);
    }

    public function testYearDate() {
        $result = $this->pdo->query(<<<SQL
            SELECT YEAR("2025-12-04")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 2025);
    }

    public function testYearNull() {
        $result = $this->pdo->query(<<<SQL
            SELECT YEAR(NULL)
        SQL);

        $this->assertNull($result->fetchColumn(0));
    }
    
}