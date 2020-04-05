<?php

namespace TheHeroGame\Builder\Parts;

abstract class World
{
    private $data = [];

    final public function setPart($key, $value)
    {
        $this->data[$key] = $value;
    }

    final public function getPart($key)
    {
        return $this->data[$key];
    }
}
