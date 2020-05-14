<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Lands Model
 *
 * @property \App\Model\Table\AdminsTable|\Cake\ORM\Association\BelongsTo $Admins
 * @property \App\Model\Table\LandTypesTable|\Cake\ORM\Association\BelongsTo $LandTypes
 * @property \App\Model\Table\LandStatusesTable|\Cake\ORM\Association\BelongsTo $LandStatuses
 * @property \App\Model\Table\CostsTable|\Cake\ORM\Association\HasMany $Costs
 *
 * @method \App\Model\Entity\Land get($primaryKey, $options = [])
 * @method \App\Model\Entity\Land newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Land[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Land|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Land|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Land patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Land[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Land findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReportsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('lands');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Admins', [
            'foreignKey' => 'admin_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('LandTypes', [
            'foreignKey' => 'land_type_id'
        ]);
        $this->belongsTo('LandStatuses', [
            'foreignKey' => 'land_status_id'
        ]);
        $this->hasMany('Costs', [
            'foreignKey' => 'land_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 255)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->numeric('acre')
            ->allowEmpty('acre');

        $validator
            ->numeric('kanal')
            ->allowEmpty('kanal');

        $validator
            ->numeric('marla')
            ->allowEmpty('marla');

        $validator
            ->scalar('location')
            ->allowEmpty('location');

        $validator
            ->scalar('city')
            ->maxLength('city', 255)
            ->allowEmpty('city');

        $validator
            ->scalar('khewat')
            ->maxLength('khewat', 255)
            ->allowEmpty('khewat');

        $validator
            ->scalar('khasra')
            ->maxLength('khasra', 255)
            ->allowEmpty('khasra');

        $validator
            ->scalar('patwar_halka')
            ->maxLength('patwar_halka', 255)
            ->allowEmpty('patwar_halka');

        $validator
            ->scalar('best_for')
            ->allowEmpty('best_for');

        $validator
            ->decimal('demand')
            ->allowEmpty('demand');

        $validator
            ->decimal('sale')
            ->allowEmpty('sale');

        $validator
            ->decimal('cost')
            ->allowEmpty('cost');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        $validator
            ->date('purchased')
            ->allowEmpty('purchased');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['admin_id'], 'Admins'));
        $rules->add($rules->existsIn(['land_type_id'], 'LandTypes'));
        $rules->add($rules->existsIn(['land_status_id'], 'LandStatuses'));

        return $rules;
    }
}
