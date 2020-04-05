<?php

namespace TheHeroGame\Character;

use TheHeroGame\Logger\Logger;

class Beast extends CharacterAbstract
{

    public function __construct()
    {
        $this->name = 'The Beast';
    }

    public function setAttack()
    {
        $this->attack = rand(25, 40)/100;
    }

    public function getLogger(): Logger
    {
        return Logger::getInstance();
    }

    public function defend($attacker)
    {
        $defender = $this;
        $logger = $this->getLogger();

        $attacker->setAttack();

        $logger->log($attacker->getName(). ' attacks with the power of '. $attacker->getAttack(). '!'."\n");

        //An attacker can miss his hit and do no damage if the defender gets lucky that turn.
        if ($attacker->getAttack() < $defender->getLuck()) {
            $logger->log($defender->getName() . ' gets lucky this turn! ' . $attacker->getName() . ' misses.'."\n"."\n");
        }
        else {
            $attacker->setDamage($attacker->getStrength() - $defender->getDefense());

            $logger->log($attacker->getName() . ' does '. $attacker->getDamage() .' damage!' . "\n");
            $defender->setHealth($defender->getHealth() - $attacker->getDamage() );
            $logger->log($defender->getName() . ' has '. $defender->getHealth() .' remaining health.'."\n"."\n");

            if (method_exists($attacker->getName(), 'rapidStrike') && $attacker->rapidStrike()) {
                $logger->log($attacker->getName() . ' gets Rapid Strike! He can atack twice.'."\n"."\n");

                $logger->log($attacker->getName() . ' does '. $attacker->getDamage() .' damage!' . "\n");
                $defender->setHealth($defender->getHealth() - $attacker->getDamage());
                $logger->log($defender->getName() . ' has '. $defender->getHealth() .' remaining health.'."\n"."\n");
            }
        }
    }

}

