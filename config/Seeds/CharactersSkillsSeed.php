<?php

use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;

/**
 * CharactersSkills seed.
 */
class CharactersSkillsSeed extends AbstractSeed
{

    private function getCharacters() {
        $characters = TableRegistry::get('Characters');
        return $characters->find('seed');
    }

    private function getSkills() {
        $skills = TableRegistry::get('Skills');
        return $skills->find('seed');
    }

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $table = TableRegistry::get('characters_skills');
        $table->deleteAll([]);

        $characters = $this->getCharacters()->toArray();
        $skills = $this->getSkills()->toArray();

        $faker = Faker\Factory::create();
        $data = [];

        for ($i=1; $i<=10; $i++) {
            $data[] = [
                'id' => $faker->uuid,
                'character_id' => $characters[array_rand($characters)]['id'],
                'skill_id' => $skills[array_rand($skills)]['id']
            ];
        }

        $table = $this->table('characters_skills');
        $table->insert($data)->save();
    }

}
