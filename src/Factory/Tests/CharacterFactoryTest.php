<?php

namespace TheHeroGame\Factory\Tests;

use PHPUnit\Framework\TestCase;
use TheHeroGame\Factory\BeastFactory;
use TheHeroGame\Factory\OrderusFactory;
use TheHeroGame\Character\Orderus;
use TheHeroGame\Character\Beast;

class CharacterFactoryTest extends TestCase
{
    public function testCanCreateOrderusFactory()
    {
        $oStats = array('health'   => rand(70, 100),
                        'strength' => rand(70, 80),
                        'defense'  => rand(45, 55),
                        'speed'    => rand(40, 50),
                        'luck'     => rand(10, 30)/100);

        $factory = new OrderusFactory();
        $orderus = $factory->create($oStats);

        $this->assertInstanceOf(Orderus::class, $orderus);
    }

    public function testCanCreateBeastFactory()
    {
        $bStats = array('health'   => rand(60, 90),
                        'strength' => rand(60, 90),
                        'defense'  => rand(40, 60),
                        'speed'    => rand(40, 60),
                        'luck'     => rand(25, 40)/100);

        $factory = new BeastFactory();
        $beast = $factory->create($bStats);

        $this->assertInstanceOf(Beast::class, $beast);
    }
}