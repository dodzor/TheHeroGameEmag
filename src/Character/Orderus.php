<?php

namespace TheHeroGame\Character;

use TheHeroGame\Logger\Logger;

class Orderus extends CharacterAbstract
{

    public function __construct()
    {
        $this->name = 'Orderus';
    }

    public function setAttack()
    {
        $this->attack = rand(25, 40)/100;
    }

    // Strike twice while it’s his turn to attack;
    // there’s a 10% chance he’ll use this skill every time he attacks
    public function rapidStrike()
    {
        if (rand(0, 99) < 10) return true;

        return false;
    }

    // Takes only half of the usual damage when an enemy attacks;
    // there’s a 20% chance he’ll use this skill every time he defends.
    public function magicShield()
    {
        if (rand(0, 99) < 20) return true;

        return false;
    }

    public function getLogger(): Logger
    {
        return Logger::getInstance();
    }

    public function defend($attacker)
    {
        $logger = $this->getLogger();

        $attacker->setAttack();
        $logger->log($attacker->getName(). ' attacks with the power of '. $attacker->getAttack(). '!'."\n");

        //An attacker can miss his hit and do no damage if the defender gets lucky that turn.
        if ($attacker->getAttack() < $this->getLuck()) {
            $logger->log($this->getName() . ' gets lucky this turn! ' . $attacker->getName() . ' misses.'."\n"."\n");
        }
        else {
            $attacker->setDamage($attacker->getStrength() - $this->getDefense());

            if ($this->magicShield()) {
                $logger->log($this->getName() . ' gets Magic Shield! He only takes half of the normal damage.' . "\n");
                $logger->log($attacker->getName() . ' does '. (float) $attacker->getDamage() / 2 .' damage.' . "\n");
                $this->setHealth($this->getHealth() - $attacker->getDamage() / 2);
            }
            else {
                $logger->log($attacker->getName() . ' does '. (float)$attacker->getDamage() .' damage.' . "\n");
                $this->setHealth($this->getHealth() - $attacker->getDamage());
            }
            $logger->log($this->getName() . ' has '. $this->getHealth() .' remaining health.' . "\n" . "\n");
        }
    }
}