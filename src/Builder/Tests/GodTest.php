<?php

namespace TheHeroGame\Builder\Tests;

use PHPUnit\Framework\TestCase;

use TheHeroGame\Builder\God;
use TheHeroGame\Builder\EmagiaBuilder;
use TheHeroGame\Builder\Parts\Emagia;
use TheHeroGame\Character\Orderus;
use TheHeroGame\Character\Beast;

class GodTest extends TestCase
{
    public function testCanBuildEmagia()
    {
        $emagiaBuilder = new EmagiaBuilder();
        $emagia = (new God())->build($emagiaBuilder);

        $this->assertInstanceOf(Emagia::class, $emagia);
    }

    public function testCanAddCharacters()
    {
        $emagiaBuilder = new EmagiaBuilder();
        $emagia = (new God())->build($emagiaBuilder);

        $this->assertInstanceOf(Orderus::class, $emagia->getPart('Orderus'));
        $this->assertInstanceOf(Beast::class, $emagia->getPart('Beast'));
    }
}

