<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day2;

use PHPUnit\Framework\TestCase;

class PasswordTesterTest extends TestCase
{
    public function testIsValid(): void
    {
        $password_tester = new PasswordTester();

        self::assertTrue($password_tester->isValid("1-3 a: abcde"));
        self::assertFalse($password_tester->isValid("1-3 b: cdefg"));
        self::assertTrue($password_tester->isValid("2-9 c: ccccccccc"));
        self::assertTrue($password_tester->isValid("7-12 n: nnnnnnvnnnnn"));
    }

    public function testIsValid2(): void
    {
        $password_tester = new PasswordTester();

        self::assertTrue($password_tester->isValid2("1-3 a: abcde"));
        self::assertFalse($password_tester->isValid2("1-3 b: cdefg"));
        self::assertFalse($password_tester->isValid2("2-9 c: ccccccccc"));
        self::assertTrue($password_tester->isValid2("7-12 n: nnnnnnvnnnnn"));
    }
}
