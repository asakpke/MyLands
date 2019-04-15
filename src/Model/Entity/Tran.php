<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Tran Entity
 *
 * @property int $admin_id
 * @property int $id
 * @property float $amount
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Admin $admin
 */
class Tran extends Entity
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
        'admin_id' => true,
        'amount' => true,
        'created' => true,
        'modified' => true,
        'admin' => true
    ];
}
