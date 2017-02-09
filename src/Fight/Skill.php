<?php

namespace App\Fight;

use App\Model\Entity\Skill as SkillEntity;

/**
 * Class Skill
 * @package App\Fight
 */
class Skill
{

    public $id;

    public $name;

    public $description;

    public $target;

    public $cost;

    public $power;

    public $operation;

    public $baseAttribute;

    public $targetAttribute;

    public function buildFromEntity(SkillEntity $skill)
    {
        $this->id = $skill->id;
        $this->name = $skill->name;
        $this->description = $skill->description;
        $this->target = $skill->target;
        $this->cost = $skill->cost;
        $this->power = $skill->power;
        $this->operation = $skill->operation;
        $this->baseAttribute = $skill->base_attribute;
        $this->targetAttribute = $skill->target_attribute;

        return $this;
    }

}
