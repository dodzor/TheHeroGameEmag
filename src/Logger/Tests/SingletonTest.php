<?php

namespace TheHeroGame\Logger\Tests;

use PHPUnit\Framework\TestCase;
use TheHeroGame\Logger\Logger;

class SingletonTest extends TestCase
{
    public function testUniqueness()
    {
        $firstCall = Logger::getInstance();
        $secondCall = Logger::getInstance();

        $this->assertInstanceOf(Logger::class, $firstCall);
        $this->assertSame($firstCall, $secondCall);
    }
}
