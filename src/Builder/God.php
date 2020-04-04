<?php

namespace TheHeroGame\Builder;

use TheHeroGame\Builder\Parts\World;

class God
{
    public function build(WorldBuilderInterface $builder): World
    {
        $builder->createWorld();
        $builder->initializeWorld();

        return $builder->getWorld();
    }
}