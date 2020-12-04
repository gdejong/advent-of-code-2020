<?php
declare(strict_types=1);

namespace gdejong\AoC2020\Day4;

use PHPUnit\Framework\TestCase;

class PassportTest extends TestCase
{
    public function testCountValid(): void
    {
        $in = [
            "ecl:gry pid:860033327 eyr:2020 hcl:#fffffd
byr:1937 iyr:2017 cid:147 hgt:183cm",
            "iyr:2013 ecl:amb cid:350 eyr:2023 pid:028048884
hcl:#cfa07d byr:1929",
            "hcl:#ae17e1 iyr:2013
eyr:2024
ecl:brn pid:760753108 byr:1931
hgt:179cm",
            "hcl:#cfa07d eyr:2025 pid:166559648
iyr:2011 ecl:brn hgt:59in"
        ];

        $p = new Passport();

        self::assertSame(2, $p->countValid($in));
    }

    public function testCountValid2(): void
    {
        $in = [
            // invalid
            "eyr:1972 cid:100
hcl:#18171d ecl:amb hgt:170 pid:186cm iyr:2018 byr:1926",
            "iyr:2019
hcl:#602927 eyr:1967 hgt:170cm
ecl:grn pid:012533040 byr:1946",
            "hcl:dab227 iyr:2012
ecl:brn hgt:182cm pid:021572410 eyr:2020 byr:1992 cid:277",
            "hgt:59cm ecl:zzz
eyr:2038 hcl:74454a iyr:2023
pid:3556412378 byr:2007",
            // valid
            "pid:087499704 hgt:74in ecl:grn iyr:2012 eyr:2030 byr:1980
hcl:#623a2f",
            "eyr:2029 ecl:blu cid:129 byr:1989
iyr:2014 pid:896056539 hcl:#a97842 hgt:165cm",
            "hcl:#888785
hgt:164cm byr:2001 iyr:2015 cid:88
pid:545766238 ecl:hzl
eyr:2022",
            "iyr:2010 hgt:158cm hcl:#b6652a ecl:blu byr:1944 eyr:2021 pid:093154719"
        ];

        $p = new Passport();

        self::assertSame(4, $p->countValidPart2($in));

        self::assertTrue(Passport::validateHgt("60in"));
        self::assertTrue(Passport::validateHgt("190cm"));
        self::assertTrue(Passport::validateHgt("193cm"));
        self::assertFalse(Passport::validateHgt("190in"));
        self::assertFalse(Passport::validateHgt("190"));

        self::assertTrue(Passport::validateByr("2002"));
        self::assertFalse(Passport::validateByr("2003"));

        self::assertFalse(Passport::validateEyr("2000"));
        self::assertTrue(Passport::validateEyr("2020"));

        self::assertTrue(Passport::validateIyr("2020"));
        self::assertFalse(Passport::validateIyr("2021"));

        self::assertTrue(Passport::validateHcl("#123abc"));
        self::assertFalse(Passport::validateHcl("#123abz"));
        self::assertFalse(Passport::validateHcl("123abc"));

        self::assertTrue(Passport::validateEcl("brn"));
        self::assertFalse(Passport::validateEcl("wat"));

        self::assertTrue(Passport::validatePid("000000001"));
        self::assertFalse(Passport::validatePid("0123456789"));
        self::assertFalse(Passport::validatePid("#6e4342"));
    }
}
