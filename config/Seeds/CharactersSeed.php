<?php

use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;

/**
 * Characters seed.
 */
class CharactersSeed extends AbstractSeed
{

    private function getUsers() {
        $users = TableRegistry::get('Users');
        return $users->find('seed');
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
        $table = TableRegistry::get('characters');
        $table->deleteAll([]);

        $users = $this->getUsers()->toArray();
        $faker = Faker\Factory::create();
        $data = [];

        for ($i=1; $i<=10; $i++) {
            $data[] = [
                'id' => $faker->uuid,
                'user_id' => $users[array_rand($users)]['id'],
                'name' => $faker->name,
                'description' => $faker->realText(200),
                'created' => $faker->date('Y-m-d H:i:s'),
                'modified' => $faker->date('Y-m-d H:i:s')
            ];
        }

        $table = $this->table('characters');
        $table->insert($data)->save();
    }

}
