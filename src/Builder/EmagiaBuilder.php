<?php

namespace TheHeroGame\Builder;

use TheHeroGame\Builder\Parts\Emagia;
use TheHeroGame\Character\Orderus;
use TheHeroGame\Factory\BeastFactory;
use TheHeroGame\Factory\OrderusFactory;

class EmagiaBuilder implements WorldBuilderInterface
{
    private $world;
    private $orderus;
    private $beast;

    private CONST ORDERUS = 'Orderus';
    private CONST BEAST = 'Beast';

    public function createWorld()
    {
        $this->world = new Emagia();
    }

    public function getWorld(): Emagia
    {
        return $this->world;
    }

    public function initializeWorld()
    {
        // TODO: Implement initializeWorld() method.
    }

    public function addCharacters()
    {
        $this->addOrderus();
        $this->addBeast();
    }

    private function addOrderus()
    {
        $this->createOrderus();
        $this->world->setPart(self::ORDERUS, $this->orderus);
    }

    private function addBeast()
    {
        $this->createBeast();
        $this->world->setPart(self::BEAST, $this->beast);
    }

    private function createOrderus()
    {
        $oStats = array('health'   => rand(70, 100),
                        'strength' => rand(70, 80),
                        'defense'  => rand(45, 55),
                        'speed'    => rand(40, 50),
                        'luck'     => rand(10, 30)/100);

        $orderusFactory = new OrderusFactory();
        $this->orderus = $orderusFactory->create($oStats);
    }

    private function createBeast()
    {
        $bStats = array('health'   => rand(60, 90),
                        'strength' => rand(60, 90),
                        'defense'  => rand(40, 60),
                        'speed'    => rand(40, 60),
                        'luck'     => rand(25, 40)/100);

        $beastFactory = new BeastFactory();
        $this->beast = $beastFactory->create($bStats);
    }

}