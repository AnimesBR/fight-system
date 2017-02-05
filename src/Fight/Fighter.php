<?php

namespace App\Fight;

use App\Model\Entity\Character;

/**
 * Class Fighter
 * @package App\Fight
 */
class Fighter
{
    public $name;

    public $level;

    public $attack;

    public $defense;

    public $mobility;

    public $health;

    public $energy;

    public $hp;

    public $ep;

    public function buildFromCharacter(Character $character)
    {
        $this->name = $character->name;
        $this->level = $character->level;
        $this->attack = $character->attack;
        $this->defense = $character->defense;
        $this->mobility = $character->mobility;
        $this->health = $character->health;
        $this->energy = $character->energy;

        $this->hp = $this->health * 10;
        $this->ep = $this->energy * 10;

        return $this;
    }

}
