<?php

namespace TheHeroGame\Character;

class Beast extends CharacterAbstract
{
    public function setAttack()
    {
        $this->attack = rand(25, 40)/100;
    }

}