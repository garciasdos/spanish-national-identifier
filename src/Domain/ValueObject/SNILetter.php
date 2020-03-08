<?php

declare(strict_types=1);

namespace SNI\Domain\ValueObject;

use SNI\Domain\Exception\InvalidSNILetter;

final class SNILetter
{
    private const UNSUPPORTED_LETTERS = ['I', 'Ñ', 'O', 'U'];
    private const REST_LETTER_MAPPING = [0 => 'T', 1 => 'R', 2 => 'W', 3 => 'A', 4 => 'G', 5 => 'M', 6 => 'Y', 7 => 'F', 8 => 'P', 9 => 'D', 10 => 'X', 11 => 'B', 12 => 'N', 13 => 'J', 14 => 'Z', 15 => 'S', 16 => 'Q', 17 => 'V', 18 => 'H', 19 => 'L', 20 => 'C', 21 => 'K', 22 => 'E'];
    private string $value;

    public function __construct(string $value)
    {
        self::ensureIsValid($value);

        $this->value = $value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public static function fromNumber(SNINumber $number): self
    {
        $rest = $number->toInt() % 23;

        return new self(self::REST_LETTER_MAPPING[$rest]);
    }

    public function value(): string
    {
        return $this->value;
    }

    private static function ensureIsValid(string $value): void
    {
        if (!ctype_alpha($value) || in_array($value, self::UNSUPPORTED_LETTERS, true)) {
            throw new InvalidSNILetter(sprintf('%s is not a valid letter', $value));
        }
    }

    public function equals(SNILetter $letter): bool
    {
        return $this->value === $letter->value;
    }
}
