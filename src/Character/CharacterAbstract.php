<?php

namespace TheHeroGame\Character;

abstract class CharacterAbstract
{
    protected $attack;
    protected $name;
    private $health;
    private $strength;
    private $defense;
    private $damage;
    private $speed;
    private $luck;

    abstract public function setAttack();

    public function setHealth(int $health)
    {
        $this->health = $health;
    }

    public function setStrength(int $strength)
    {
        $this->strength = $strength;
    }

    public function setDefense(int $defense)
    {
        $this->defense = $defense;
    }

    public function setSpeed(int $speed)
    {
        $this->speed = $speed;
    }

    public function setLuck(float $luck)
    {
        $this->luck = $luck;
    }

    public function setDamage(int $damage)
    {
        $this->damage = $damage;
    }

    public function setDamageCommand($damage)
    {
        $this->damage = $damage;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHealth(): int
    {
        return $this->health;
    }

    public function getStrength(): int
    {
        return $this->strength;
    }

    public function getDefense(): int
    {
        return $this->defense;
    }

    public function getDamage(): int
    {
        return $this->damage;
    }

    public function getSpeed(): int
    {
        return $this->speed;
    }

    public function getLuck(): float
    {
        return $this->luck;
    }

    public function getAttack(): float
    {
        return $this->attack;
    }

    public function getProp($key)
    {
        if (isset($this->$key)) {
            return $this->$key;
        }
        return null;
    }

    public function rapidStrike()
    {
        return null;
    }

    public function magicShield()
    {
        return null;
    }
}