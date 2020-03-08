<?php

declare(strict_types=1);

namespace SNI\Domain;

use SNI\Domain\Exception\InvalidSNI;
use SNI\Domain\ValueObject\SNILetter;
use SNI\Domain\ValueObject\SNINumber;

final class SNI
{
    private SNINumber $number;
    private SNILetter $letter;

    private function __construct(SNINumber $number, SNILetter $letter)
    {
        $this->number = $number;
        $this->letter = $letter;
    }

    public function value(): string
    {
        return $this->number->value() . $this->letter->value();
    }

    public function number(): SNINumber
    {
        return $this->number;
    }

    public function letter(): SNILetter
    {
        return $this->letter;
    }

    public static function fromString(string $value): self
    {
        $number = SNINumber::fromNumericString(filter_var($value, FILTER_SANITIZE_NUMBER_INT));
        $letter = SNILetter::fromString(substr($value, -1));

        self::ensureIsValid($number, $letter);

        return new self($number, $letter);
    }

    private static function ensureIsValid(SNINumber $number, SNILetter $letter): void
    {
        if (!$number->getLetter()->equals($letter)) {
            throw new InvalidSNI(sprintf('%s does not correspond to letter %s', $number->value(), $letter->value()));
        }
    }
}
