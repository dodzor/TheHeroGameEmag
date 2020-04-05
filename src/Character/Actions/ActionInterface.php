<?php

namespace TheHeroGame\Character\Actions;

use TheHeroGame\Character\CharacterAbstract;

interface ActionInterface
{
    public function execute(CharacterAbstract $attacker);
}