<?php

use Cake\ORM\TableRegistry;
use Migrations\AbstractSeed;

/**
 * Skills seed.
 */
class SkillsSeed extends AbstractSeed
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
        $table = TableRegistry::get('skills');
        $table->deleteAll([]);

        $faker = Faker\Factory::create();
        $data = [];

        for ($i=1; $i<=10; $i++) {
            $operation = $faker->randomElement(['-', '+']);
            $target = $faker->randomElement(['single', 'multiple', 'self']);
            $baseAttribute = $faker->randomElement(['attack', 'energy']);
            $targetAttribute = $faker->randomElement(['hp']);
            $description = "{$baseAttribute} {$target} {$operation} {$targetAttribute}";

            $data[] = [
                'id' => $faker->uuid,
                'name' => $faker->sentence(rand(2,5)),
                'description' => $description,
                'target' => $target,
                'power' => rand(1,10),
                'operation' => $operation,
                'base_attribute' => $baseAttribute,
                'target_attribute' => $targetAttribute,
                'cost_attribute' => 'ep',
                'cost' => rand(1, 10),
            ];
        }

        $table = $this->table('skills');
        $table->insert($data)->save();
    }

}
