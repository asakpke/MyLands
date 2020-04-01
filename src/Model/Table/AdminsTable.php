<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Admins Model
 *
 * @property \App\Model\Table\CostCatsTable|\Cake\ORM\Association\HasMany $CostCats
 * @property \App\Model\Table\LandStatusesTable|\Cake\ORM\Association\HasMany $LandStatuses
 * @property \App\Model\Table\LandTypesTable|\Cake\ORM\Association\HasMany $LandTypes
 * @property \App\Model\Table\LandsTable|\Cake\ORM\Association\HasMany $Lands
 *
 * @method \App\Model\Entity\Admin get($primaryKey, $options = [])
 * @method \App\Model\Entity\Admin newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Admin[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Admin|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Admin patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Admin[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Admin findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AdminsTable extends Table
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

        $this->setTable('admins');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('CostCats', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('LandStatuses', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('LandTypes', [
            'foreignKey' => 'admin_id'
        ]);
        $this->hasMany('Lands', [
            'foreignKey' => 'admin_id'
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
            ->allowEmpty('name');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->scalar('pass')
            ->maxLength('pass', 255)
            ->requirePresence('pass', 'create')
            ->notEmpty('pass');

        $validator
            ->scalar('subdomain')
            ->maxLength('subdomain', 255)
            ->requirePresence('subdomain', 'create')
            ->notEmpty('subdomain');

        $validator
            ->scalar('remarks')
            ->allowEmpty('remarks');

        $validator
            ->scalar('status')
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->boolean('is_verified')
            ->requirePresence('is_verified', 'create')
            ->notEmpty('is_verified');

        $validator
            ->decimal('balance')
            ->requirePresence('balance', 'create')
            ->notEmpty('balance');

        $validator
            ->date('next_payment')
            ->allowEmpty('next_payment');
           
		$validator
            ->scalar('email_verification_hash')
            ->maxLength('email_verification_hash', 32)
            ->requirePresence('email_verification_hash', 'create')
            ->notEmpty('email_verification_hash');

        $validator
            ->scalar('forgot_password_hash')
            ->maxLength('forgot_password_hash', 32)
            ->allowEmpty('forgot_password_hash')
        ;

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
        // $rules->add($rules->isUnique(['email']));
        $rules->add($rules->isUnique(['subdomain']));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    // public function findAuthAdmin(\Cake\ORM\Query $query, array $options)
    {
        // pr($query);
        // pr($options);
        
        $query
            ->select(['id', 'email', 'pass'])
            ->where([
                'status' => 'Active',
                // 'subdomain' => $this->request->env('HTTP_HOST'),
                'subdomain' => $_SERVER['HTTP_HOST'],
            ]);
        return $query;
    } // findAuth()
}