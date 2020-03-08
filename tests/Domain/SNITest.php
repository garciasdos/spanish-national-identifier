<?php

declare(strict_types=1);

namespace SNI\Tests\Domain;

use PHPUnit\Framework\TestCase;
use SNI\Domain\SNI;

final class SNITest extends TestCase
{
    public function test_given_valid_sni_should_instantiate_well(): void
    {
        $sni = SNI::fromString('73432616X');

        $this->assertEquals('73432616X', $sni->value());
    }
}
