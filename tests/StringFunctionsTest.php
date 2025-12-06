<?php

use MySQLite\MySQLite;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(StringFunctionsTest::class)]
class StringFunctionsTest extends TestCase {
    private PDO $pdo;

    public function setUp(): void
    {
        parent::setUp();
        $this->pdo = new PDO('sqlite::memory:');
        MySQLite::install($this->pdo);
    }

    public function testConcat() {
        $result = $this->pdo->query(<<<SQL
            SELECT CONCAT("A", "B", "C", 123)
        SQL);

        $this->assertEquals($result->fetchColumn(0), "ABC123");
    }

    public function testConcatWithNull() {
        $result = $this->pdo->query(<<<SQL
            SELECT CONCAT("A", "B", NULL, "C", 123)
        SQL);

        $this->assertEquals($result->fetchColumn(0), NULL);
    }  
}