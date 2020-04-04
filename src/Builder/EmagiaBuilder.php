<?php

namespace TheHeroGame\Builder;

use TheHeroGame\Builder\Parts\Emagia;

class EmagiaBuilder implements WorldBuilderInterface
{
    private $world;

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
        // TODO: Implement initializeWorld() method.
    }

}