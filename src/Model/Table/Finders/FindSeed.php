<?php

namespace App\Model\Table\Finders;

use Cake\ORM\Query;

trait FindSeed
{

    /**
     * @param Query $query
     * @param array $options
     * @return Query
     */
    public function findSeed(Query $query, array $options)
    {
        $limit = (int) !empty($options['limit']) && is_integer($options['limit'])
            ? $options['limit']
            : 10;
        return $query;
    }

}
