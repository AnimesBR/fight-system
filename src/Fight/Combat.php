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
        $this->id = uniqid('combat');
    }

    /**
     * @param \App\Fight\Fighter $fighter
     */
    public function add(Fighter $fighter)
    {
        $this->fighters[] = $fighter;
    }

}
