<?php

namespace TheHeroGame\Builder\Tests;

use PHPUnit\Framework\TestCase;

use TheHeroGame\Builder\God;
use TheHeroGame\Builder\EmagiaBuilder;
use TheHeroGame\Builder\Parts\Emagia;

class GodTest extends TestCase
{
    public function testCanBuildEmagia()
    {
        $emagiaBuilder = new EmagiaBuilder();
        $emagia = (new God())->build($emagiaBuilder);

        $this->assertInstanceOf(Emagia::class, $emagia);
    }
}

