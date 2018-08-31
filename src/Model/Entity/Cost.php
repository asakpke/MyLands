<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Cost Entity
 *
 * @property int $land_id
 * @property int $cost_cat_id
 * @property int $admin_id
 * @property int $id
 * @property float $cost
 * @property string $remarks
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Land $land
 * @property \App\Model\Entity\CostCat $cost_cat
 * @property \App\Model\Entity\Admin $admin
 */
class Cost extends Entity
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
        'land_id' => true,
        'cost_cat_id' => true,
        'admin_id' => true,
        'cost' => true,
        'remarks' => true,
        'created' => true,
        'modified' => true,
        'land' => true,
        'cost_cat' => true,
        'admin' => true
    ];
}
