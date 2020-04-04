<?php

require __DIR__ . '/vendor/autoload.php';

use TheHeroGame\Builder\God;
use TheHeroGame\Builder\EmagiaBuilder;

$builder = new EmagiaBuilder();
(new God())->build($builder);