<?php

namespace TheHeroGame\Builder;

use TheHeroGame\Builder\Parts\Emagia;
use TheHeroGame\Character\Orderus;
use TheHeroGame\Character\Beast;
use TheHeroGame\Factory\BeastFactory;
use TheHeroGame\Factory\OrderusFactory;
use TheHeroGame\Logger\Logger;

class EmagiaBuilder implements WorldBuilderInterface
{
    private $world;

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
        $orderus = $this->getOrderus();
        $beast = $this->getBeast();

        $logger = $this->getLogger();

        $logger->log("\n".'Initializing new game..'."\n"."\n");
        $logger->log('Our mighty hero Orderus is walking in the ever-green forests of Emagia,'."\n");
        $logger->log('When out of the darkness a wild beast appears.'."\n");
        $logger->log('An epic fight commences.'."\n"."\n");

        $logger->log('Orderus stats are:'."\n");
        $logger->log('Health: '. $orderus->getHealth()."\n");
        $logger->log('Strength: '. $orderus->getStrength()."\n");
        $logger->log('Defense: '. $orderus->getDefense()."\n");
        $logger->log('Speed:' .$orderus->getSpeed()."\n");
        $logger->log('Luck:' .$orderus->getLuck()."\n"."\n");

        $logger->log('The beast stats are:'. "\n");
        $logger->log('Health: '. $beast->getHealth()."\n");
        $logger->log('Strength: '. $beast->getStrength()."\n");
        $logger->log('Defense: '. $beast->getDefense()."\n");
        $logger->log('Speed:' .$beast->getSpeed()."\n");
        $logger->log('Luck:' .$beast->getLuck()."\n"."\n");

        $this->startGame();
    }

    public function startGame()
    {
        $logger = $this->getLogger();

        $this->gameOver();
    }

    public function gameOver()
    {

    }

    public function addCharacters()
    {
        $this->addOrderus();
        $this->addBeast();
    }

    private function addOrderus()
    {
        $this->world->setPart(self::ORDERUS, $this->createOrderus());
    }

    private function addBeast()
    {
        $this->world->setPart(self::BEAST, $this->createBeast());
    }

    private function createOrderus()
    {
        $oStats = array('health'   => rand(70, 100),
                        'strength' => rand(70, 80),
                        'defense'  => rand(45, 55),
                        'speed'    => rand(40, 50),
                        'luck'     => rand(10, 30)/100);

        $orderusFactory = new OrderusFactory();
        return $orderusFactory->create($oStats);
    }

    private function createBeast()
    {
        $bStats = array('health'   => rand(60, 90),
                        'strength' => rand(60, 90),
                        'defense'  => rand(40, 60),
                        'speed'    => rand(40, 60),
                        'luck'     => rand(25, 40)/100);

        $beastFactory = new BeastFactory();
        return $beastFactory->create($bStats);
    }

    public function getOrderus(): Orderus
    {
        return $this->world->getPart(self::ORDERUS);
    }

    public function getBeast(): Beast
    {
        return $this->world->getPart(self::BEAST);
    }

    public function getLogger(): Logger
    {
        return Logger::getInstance();
    }

}
