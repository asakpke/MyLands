<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Master Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $pass
 * @property string $subdomain
 * @property string $remarks
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 */
class Master extends Entity
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
        'name' => true,
        'email' => true,
        'pass' => true,
        'subdomain' => true,
        'remarks' => true,
        'created' => true,
        'modified' => true
    ];
}
