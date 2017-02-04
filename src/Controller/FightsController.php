<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use App\Fight\Fighter;

/**
 * Fights Controller
 */
class FightsController extends AppController
{
    private $characters;

    private $skills = [
        0 => [
            'name' => 'Punch',
            'descriptions' => [
                'run and punch'
            ],
            'attribute' => 'attack',
            'affect' => 'hp',
            'affect_type' => '-',
            'cost' => 5,
            'power_base' => 1,
            'power_max' => 3
        ],
        1 => [
            'name' => 'Kick',
            'descriptions' => [
                'jump and kick'
            ],
            'attribute' => 'attack',
            'affect' => 'hp',
            'affect_type' => '-',
            'cost' => 10,
            'power_base' => 2,
            'power_max' => 5
        ],
        2 => [
            'name' => 'Energy Beam',
            'descriptions' => [
                'concentrates energy and dispares against'
            ],
            'attribute' => 'energy',
            'affect' => 'hp',
            'affect_type' => '-',
            'cost' => 10,
            'power_base' => 5,
            'power_max' => 10
        ],
    ];

    public function initialize()
    {
        parent::initialize();
        $this->characters = TableRegistry::get('Characters');
    }

    public function simulate()
    {
        $characters = $this->characters
            ->find()
            ->limit(2)
            ->order('rand()')
            ->all()
            ->toArray();

        $fighterA = (new Fighter())->buildFromCharacter($characters[0]);
        $fighterB = (new Fighter())->buildFromCharacter($characters[1]);

        $fight = true;
        $log = [];
        $log[] = "Fighter A - HP/{$fighterA->hp}";
        $log[] = "Fighter B - HP/{$fighterB->hp}";
        while ($fight) {
            $log[] = $fighterA->uses($this->skills[array_rand($this->skills)], $fighterB);
            $log[] = $fighterB->uses($this->skills[array_rand($this->skills)], $fighterA);
            $log[] = "Fighter A - HP/{$fighterA->hp}";
            $log[] = "Fighter B - HP/{$fighterB->hp}";

            if ($fighterA->hp <= 0 OR $fighterB->hp <= 0) {
                $fight = false;
            }
        }
        debug($log);

        $this->autoRender = false;
    }

}
