<?php

declare(strict_types=1);

namespace SNI\Domain\ValueObject;

use SNI\Domain\Exception\InvalidSNINumber;

final class SNINumber
{
    private const SIZE = 8;
    /**
     * @var string
     */
    private string $value;

    private function __construct(string $value)
    {
        $this->value = $value;
    }

    public static function fromNumericString(string $value)
    {
        self::ensureIsValid($value);

        return new self($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    private static function ensureIsValid(string $value): void
    {
        if (strlen($value) !== self::SIZE) {
            throw new InvalidSNINumber(sprintf('%s is not a valid number', $value));
        }
    }

    public function getLetter()
    {
        return SNILetter::fromNumber($this);
    }

    public function toInt(): int
    {
        return (int)$this->value;
    }
}
