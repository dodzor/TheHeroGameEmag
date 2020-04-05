<?php

namespace TheHeroGame\Builder;

use TheHeroGame\Builder\Parts\Emagia;
use TheHeroGame\Character\Actions\HitAction;
use TheHeroGame\Character\Orderus;
use TheHeroGame\Character\Beast;
use TheHeroGame\Factory\BeastFactory;
use TheHeroGame\Factory\OrderusFactory;
use TheHeroGame\Logger\Logger;

class EmagiaBuilder implements WorldBuilderInterface
{
    private $world;

    private CONST ORDERUS = 'Orderus';
    private CONST BEAST = 'The Beast';
    private CONST TURNS = 20;

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

        $logger->log('The Beast stats are:'. "\n");
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

        $characters = $this->getInitialAttackerAndDefender();
        $attacker = $characters[0];
        $defender = $characters[1];

        //The game ends when one of the players remain without health or the number of turns reaches 20.
        for ($turn = 1; $turn <= self::TURNS; $turn++) {
            $logger->log('TURN '. $turn . "\n");

            ($attacker->setAction(new HitAction($defender)))->run();

            // test if the game is over
            $this->gameOver($turn);

            $temp = $attacker;
            $attacker = $defender;
            $defender = $temp;
        }
    }

    private function gameOver($currentTurn)
    {
        $orderus = $this->getOrderus();
        $beast = $this->getBeast();

        $logger = $this->getLogger();

        if ($beast->getHealth() <= 0) {
            $logger->log('The Beast had no chance.. Orderus delivers one last mighty blow cutting off the beast head.'."\n");
            $logger->log('Orderus emerges victorious!'."\n"."\n");
        }
        else if ($orderus->getHealth() <= 0) {
            $logger->log('Orderus had no chance against this spawn of Hell.'."\n");
            $logger->log('With a final charge The Beast crushes the helpless hero and drags his remains into the dark woods.'."\n");
            $logger->log('He is never to be heard again..'."\n"."\n");
        }
        else if ($currentTurn == self::TURNS) {
            $logger->log('Both hero and beast fall down in exhaustion.. After a long nap they become close friends. THE END :)'."\n"."\n");
        }
        else {
            return;
        }

        $logger->printLogs();
        exit;
    }

    private function getInitialAttackerAndDefender()
    {
        $orderus = $this->getOrderus();
        $beast = $this->getBeast();

        //The first attack is done by the player with the higher speed
        if ($orderus->getSpeed() != $beast->getSpeed()) {
            $attacker = $orderus->getSpeed() > $beast->getSpeed() ? $orderus : $beast;
            $defender = $attacker === $orderus ? $beast : $orderus;
        }
        //The first attack is carried on by the player with the highest luck
        else {
            $attacker = $orderus->getLuck() > $beast->getLuck() ? $orderus : $beast;
            $defender = $attacker === $orderus ? $beast : $orderus;
        }

        $logger = $this->getLogger();
        $logger->log('Attacker: '. $attacker->getName(). "\n");
        $logger->log('Defender: '. $defender->getName(). "\n\n");

        return [$attacker, $defender];
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
