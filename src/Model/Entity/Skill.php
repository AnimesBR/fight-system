<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Skill Entity
 *
 * @property string $id
 * @property string $name
 * @property string $description
 * @property string $target
 * @property int $power
 * @property string $operation
 * @property string $base_attribute
 * @property string $target_attribute
 * @property string $cost_attribute
 * @property int $cost
 *
 * @property \App\Model\Entity\Character[] $characters
 */
class Skill extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
