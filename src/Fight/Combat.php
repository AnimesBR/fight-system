<?php

namespace App\Fight;

use App\Fight\Fighter;

/**
 * Class Combat
 * @package App\Fight
 */
class Combat
{

    public $id;

    public $fighters = [];

    public $turn = 1;

    public $actions = [];

    public $finished = false;

    /**
     * Combat constructor.
     */
    public function __construct()
    {
        $this->id = uniqid('combat_');
    }

    /**
     * @param \App\Fight\Fighter $fighter
     * @return string
     */
    public function addFighter(Fighter $fighter)
    {
        $id = uniqid('fighter_');
        $this->fighters[$id] = $fighter;
        return $id;
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function getFighter($id)
    {
        if (!isset($this->fighters[$id])) {
            return false;
        }
        return $this->fighters[$id];
    }

    /**
     * @param $id
     * @param $field
     * @return bool
     */
    public function getFighterProperty($id, $field)
    {
        if (!isset($this->fighters[$id])) {
            return false;
        }
        return (!empty($this->fighters[$id]->$field) ? $this->fighters[$id]->$field : false);
    }

    public function status()
    {
        foreach ($this->fighters as $fighter) {
            $status  = $fighter->name . "/ HP:  {$fighter->hp} / EP: {$fighter->ep} / ";
            $status .= "A({$fighter->attack}) D({$fighter->defense}) M({$fighter->mobility}) H({$fighter->health}) E({$fighter->energy})";
            echo "$status<br>";
        }
    }

    public function registerTurn(
        Skill $skill,
        $casterId,
        $targetId = null
    ) {
        $action = [
            'skill' => $skill,
            'caster' => $casterId
        ];
        if (!empty($target)) {
            $action['target'] = $targetId;
        }
        $this->actions["turn_{$this->turn}"][] = $action;
        $this->checkTurn();
    }

    public function passTurn($id)
    {
        $this->actions["turn_{$this->turn}"][] = [
            'pass' => true,
            'fighter' => $id
        ];
        $this->checkTurn();
    }

    private function checkTurn() {
        if (count($this->actions["turn_{$this->turn}"]) == count($this->fighters)) {
            // TODO - Process combat mechanics
            $this->turn++;
        }
    }

}
