<?php
declare(strict_types=1);

namespace SNI\Tests\Domain\ValueObject;

use PHPUnit\Framework\TestCase;
use SNI\Domain\Exception\InvalidSNILetter;
use SNI\Domain\ValueObject\SNILetter;

final class SNILetterTest extends TestCase
{
    public function test_given_valid_letter_should_instantiate_new_one(): void
    {
        $letter = SNILetter::fromString('A');

        $this->assertSame('A', $letter->value());
    }

    public function test_given_invalid_letter_should_throw_exception(): void
    {
        $letter = 'O';

        $this->expectException(InvalidSNILetter::class);

        SNILetter::fromString($letter);
    }

    public function test_equals(): void
    {
        $letter1 = SNILetter::fromString('A');
        $letter2 = SNILetter::fromString('A');

        $this->assertTrue($letter1->equals($letter2));
        $this->assertTrue($letter2->equals($letter1));
    }
}
