<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Fight\Combat;
use App\Fight\Skill;
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
        $aId = $combat->addFighter($fighterA);
        $bId = $combat->addFighter($fighterB);

        $skills = TableRegistry::get('skills');

        $query = $skills->find();
        $skillsA = $query->matching('Characters', function ($q) use ($combat, $aId) {
            return $q->where(['Characters.id' => $combat->getFighterProperty($aId, 'id')]);
        })->all()->toArray();

        $query = $skills->find();
        $skillsB = $query->matching('Characters', function ($q) use ($combat, $bId) {
            return $q->where(['Characters.id' => $combat->getFighterProperty($bId, 'id')]);
        })->all()->toArray();

        $combat->status();
        for ($i=1; $i<=4; $i++) {
            if (empty($skillsA)) {
                $combat->passTurn($aId);
            } else {
                $skill = new Skill();
                $skill->buildFromEntity($skillsA[array_rand($skillsA)]);
                $combat->registerTurn($skill, $aId);
            }

            if (empty($skillsB)) {
                $combat->passTurn($bId);
            } else {
                $skill = new Skill();
                $skill->buildFromEntity($skillsB[array_rand($skillsB)]);
                $combat->registerTurn($skill, $bId);
            }
        }

        $this->autoRender = false;
    }

}
