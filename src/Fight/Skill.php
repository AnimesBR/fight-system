<?php

namespace App\Fight;

use App\Model\Entity\Skill as SkillEntity;

/**
 * Class Skill
 * @package App\Fight
 */
class Skill
{

    public $name;

    public $description;

    public $target;

    public $cost;

    public $power;

    public $operation;

    public $baseAttribute;

    public $targetAttribute;

    public function buildFromSkill(SkillEntity $skill)
    {
        // TODO - Build object

        return $this;
    }

}
