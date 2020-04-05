<?php

namespace TheHeroGame\Factory;

use TheHeroGame\Character\CharacterAbstract;

abstract class CharacterFactory
{
    abstract protected function createCharacter(): CharacterAbstract;

    public function create(array $stats): CharacterAbstract
    {
        $character = $this->createCharacter();

        $character->setHealth($stats['health']);
        $character->setStrength($stats['strength']);
        $character->setDefense($stats['defense']);
        $character->setSpeed($stats['speed']);
        $character->setLuck($stats['luck']);

        return $character;
    }
}