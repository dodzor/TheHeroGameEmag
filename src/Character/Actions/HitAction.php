<?php

namespace TheHeroGame\Character\Actions;

use TheHeroGame\Character\CharacterAbstract;

class HitAction implements ActionInterface
{
    public function __construct(CharacterAbstract $defender)
    {
        $this->defender = $defender;
    }

    public function execute(CharacterAbstract $attacker)
    {
        $this->defender->defend($attacker);
    }
}