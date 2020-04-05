<?php

namespace TheHeroGame\Factory;

use TheHeroGame\Character\CharacterAbstract;
use TheHeroGame\Character\Orderus;

class OrderusFactory extends CharacterFactory
{
    public function createCharacter(): CharacterAbstract
    {
        return new Orderus();
    }
}