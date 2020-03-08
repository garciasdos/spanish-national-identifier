<?php
declare(strict_types=1);

namespace SNI\Tests\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use SNI\Domain\ValueObject\SNINumber;

final class SNINumberTest extends TestCase
{
    public function test_number_is_correct(): void
    {
        $number = '12345678';

        $sniNumber = SNINumber::fromNumericString($number);

        $this->assertSame($number, $sniNumber->value());
        $this->assertSame(12345678, $sniNumber->toInt());
    }

    public function test_get_letter_is_getting_right_letter(): void
    {
        $number = '18193079';
        $expectedLetter = 'X';

        $sniNumber = SNINumber::fromNumericString($number);

        $this->assertSame($expectedLetter, $sniNumber->getLetter()->value());
    }
}
