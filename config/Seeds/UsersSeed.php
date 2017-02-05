<?php

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
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
        $table = TableRegistry::get('Users');
        $table->deleteAll([]);

        $faker = Faker\Factory::create();
        $data = [];

        for ($i=1; $i<=10; $i++) {
            $data[] = [
                'id' => $faker->uuid,
                'name' => $faker->name,
                'username' => $faker->userName,
                'email' => $faker->safeEmail,
                'password' => (new DefaultPasswordHasher)->hash('abc123'),
                'created' => $faker->date($format = 'Y-m-d H:i:s'),
                'modified' => $faker->date($format = 'Y-m-d H:i:s')
            ];
        }

        $table = $this->table('users');
        $table->insert($data)->save();
    }

}
