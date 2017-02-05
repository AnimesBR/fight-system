<?php
namespace App\Model\Table;

use App\Model\Table\Finders\FindSeed;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Skills Model
 *
 * @property \Cake\ORM\Association\BelongsToMany $Characters
 *
 * @method \App\Model\Entity\Skill get($primaryKey, $options = [])
 * @method \App\Model\Entity\Skill newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Skill[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Skill|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Skill patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Skill[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Skill findOrCreate($search, callable $callback = null, $options = [])
 */
class SkillsTable extends Table
{

    use FindSeed;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('skills');
        $this->displayField('name');
        $this->primaryKey('id');

        $this->belongsToMany('Characters', [
            'foreignKey' => 'skill_id',
            'targetForeignKey' => 'character_id',
            'joinTable' => 'characters_skills'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->requirePresence('description', 'create')
            ->notEmpty('description');

        $validator
            ->requirePresence('target', 'create')
            ->notEmpty('target');

        $validator
            ->integer('power')
            ->requirePresence('power', 'create')
            ->notEmpty('power');

        $validator
            ->requirePresence('operation', 'create')
            ->notEmpty('operation');

        $validator
            ->requirePresence('base_attribute', 'create')
            ->notEmpty('base_attribute');

        $validator
            ->requirePresence('target_attribute', 'create')
            ->notEmpty('target_attribute');

        $validator
            ->requirePresence('cost_attribute', 'create')
            ->notEmpty('cost_attribute');

        $validator
            ->integer('cost')
            ->requirePresence('cost', 'create')
            ->notEmpty('cost');

        return $validator;
    }

}
