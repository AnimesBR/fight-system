<?php

use Migrations\AbstractSeed;

/**
 * App seed.
 */
class AppSeed extends AbstractSeed
{

    public function run()
    {
        $this->call('UsersSeed');
        $this->call('SkillsSeed');
        $this->call('CharactersSeed');
        $this->call('CharactersSkillsSeed');
    }

}
