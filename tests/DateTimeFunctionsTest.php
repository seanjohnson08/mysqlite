<?php

use MySQLite\DateTimeFunctions;
use MySQLite\MySQLite;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(DateTimeFunctions::class)]
class DateTimeFunctionsTest extends TestCase
{
    private PDO $pdo;

    public function setUp(): void
    {
        parent::setUp();
        $this->pdo = new PDO('sqlite::memory:');
        MySQLite::install($this->pdo);
    }

    public function testMonthDateTime()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT MONTH("2025-12-04 10:47:00")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 12);
    }

    public function testMonthDate()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT MONTH("2025-12-04")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 12);
    }

    public function testMonthNull()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT MONTH(NULL)
        SQL);

        $this->assertNull($result->fetchColumn(0));
    }

    public function testYearDateTime()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT YEAR("2025-12-04 10:47:00")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 2025);
    }

    public function testYearDate()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT YEAR("2025-12-04")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 2025);
    }

    public function testYearNull()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT YEAR(NULL)
        SQL);

        $this->assertNull($result->fetchColumn(0));
    }

    public function testNow()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT NOW()
        SQL);

        $now = new DateTimeImmutable();
        $fetched = new DateTimeImmutable($result->fetchColumn(0));

        // Allow for up to 5 seconds of difference
        $this->assertLessThanOrEqual(5, abs($now->getTimestamp() - $fetched->getTimestamp()));
    }

    public function testDayDateTime()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT DAY("2025-12-04 10:47:00")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 4);
    }

    public function testDayDate()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT DAY("2025-12-04")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 4);
    }

    public function testDayNull()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT DAY(NULL)
        SQL);

        $this->assertNull($result->fetchColumn(0));
    }

    public function testDayOfMonthDateTime()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT DAYOFMONTH("2025-12-04 10:47:00")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 4);
    }

    public function testDayOfMonthDate()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT DAYOFMONTH("2025-12-04")
        SQL);

        $this->assertEquals($result->fetchColumn(0), 4);
    }

    public function testCurDate()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT CURDATE()
        SQL);

        $now = new DateTimeImmutable();
        $fetched = new DateTimeImmutable($result->fetchColumn(0));

        $this->assertEquals($now->format('Y-m-d'), $fetched->format('Y-m-d'));
    }

    public function testCurTime()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT CURTIME()
        SQL);

        $now = new DateTimeImmutable();
        $fetched = new DateTimeImmutable($result->fetchColumn(0));

        $this->assertEquals($now->format('H:i'), $fetched->format('H:i'));
    }

    public function testCurrentDate()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT CURRENT_DATE()
        SQL);

        $now = new DateTimeImmutable();
        $fetched = new DateTimeImmutable($result->fetchColumn(0));

        $this->assertEquals($now->format('Y-m-d'), $fetched->format('Y-m-d'));
    }

    public function testCurrentTime()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT CURRENT_TIME()
        SQL);

        $now = new DateTimeImmutable();
        $fetched = new DateTimeImmutable($result->fetchColumn(0));

        $this->assertEquals($now->format('H:i'), $fetched->format('H:i'));
    }

    public function testCurrentTimestamp()
    {
        $result = $this->pdo->query(<<<SQL
            SELECT CURRENT_TIMESTAMP()
        SQL);

        $now = new DateTimeImmutable();
        $fetched = new DateTimeImmutable($result->fetchColumn(0));

        // Allow for up to 5 seconds of difference
        $this->assertLessThanOrEqual(5, abs($now->getTimestamp() - $fetched->getTimestamp()));
    }
}
