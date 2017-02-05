<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Fight\Combat;
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

        $combat = new Combat();
        $combat->add($fighterA);
        $combat->add($fighterB);

        while ($combat->finished === false) {

        }

        $this->autoRender = false;
    }

}
