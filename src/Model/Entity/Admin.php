<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Admin Entity
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $pass
 * @property string $subdomain
 * @property string $remarks
 * @property string $status
 * @property bool $is_verified
 * @property float $balance
 * @property \Cake\I18n\FrozenDate $next_payment
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\CostCat[] $cost_cats
 * @property \App\Model\Entity\LandStatus[] $land_statuses
 * @property \App\Model\Entity\LandType[] $land_types
 * @property \App\Model\Entity\Land[] $lands
 */
class Admin extends Entity
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
        'status' => true,
        'is_verified' => true,
        'balance' => true,
        'next_payment' => true,
        'created' => true,
        'modified' => true,
        'cost_cats' => true,
        'land_statuses' => true,
        'land_types' => true,
        'lands' => true
    ];
}
