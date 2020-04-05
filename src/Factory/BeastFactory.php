<?php

namespace TheHeroGame\Factory;

use TheHeroGame\Character\Beast;
use TheHeroGame\Character\CharacterAbstract;

class BeastFactory extends CharacterFactory
{
    protected function createCharacter(): CharacterAbstract
    {
        return new Beast();
    }
}
