<?php

namespace App\Fight;

use App\Model\Entity\Character;

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

    public function uses(array $skill, Fighter $opponent)
    {
        $skillName = $skill['name'];
        $descriptions = $skill['descriptions'];
        $attribute = $skill['attribute'];
        $affected = $skill['affect'];
        $affectType = $skill['affect_type'];
        $powerBase = $skill['power_base'];
        $powerMax = $skill['power_max'];

        $effectBase = $this->{$attribute};
        $efficiency = $effectBase + rand($powerBase, $powerMax);

        $effectedBase = $opponent->{$affected};
        if ($affectType == '-') {
            $opponent->{$affected} = $effectedBase - $efficiency;
        }

        return "({$skillName}) {$this->name} " . $descriptions[array_rand($descriptions)] . " {$opponent->name} ({$affected} - {$efficiency}).";
    }

}
