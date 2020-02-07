<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Land Entity
 *
 * @property int $admin_id
 * @property int $land_type_id
 * @property int $land_status_id
 * @property int $id
 * @property string $name
 * @property float $acre
 * @property float $kanal
 * @property float $marla
 * @property string $location
 * @property string $city
 * @property string $khewat
 * @property string $khasra
 * @property string $patwar_halka
 * @property string $best_for
 * @property float $demand
 * @property float $sale
 * @property float $cost
 * @property string $remarks
 * @property \Cake\I18n\FrozenDate $purchased
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Admin $admin
 * @property \App\Model\Entity\LandType $land_type
 * @property \App\Model\Entity\LandStatus $land_status
 * @property \App\Model\Entity\Cost[] $costs
 */
class Land extends Entity
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
        // 'admin_id' => false,
        'land_type_id' => true,
        'land_status_id' => true,
        'name' => true,
        'acre' => true,
        'kanal' => true,
        'marla' => true,
        'location' => true,
        'city' => true,
        'khewat' => true,
        'khasra' => true,
        'patwar_halka' => true,
        'best_for' => true,
        'demand' => true,
        'sale' => true,
        'cost' => true,
        'remarks' => true,
        'purchased' => true,
        'created' => true,
        // 'created' => false,
        'modified' => true,
        // 'modified' => false,
        'admin' => true,
        'land_type' => true,
        'land_status' => true,
        'costs' => true,
        'is_public' => true
    ];
}
