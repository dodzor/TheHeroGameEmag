<?php

namespace TheHeroGame\Builder;

use TheHeroGame\Builder\Parts\World;

interface WorldBuilderInterface
{
    public function createWorld();

    public function getWorld(): World;

    public function initializeWorld();
}