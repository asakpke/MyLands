<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Masters Model
 *
 * @method \App\Model\Entity\Master get($primaryKey, $options = [])
 * @method \App\Model\Entity\Master newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Master[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Master|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Master|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Master patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Master[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Master findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class MastersTable extends Table
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

        $this->setTable('masters');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('phone')
            ->maxLength('phone', 255)
            ->requirePresence('phone', 'create')
            ->notEmpty('phone');

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
            ->scalar('forgot_password_hash')
            ->maxLength('forgot_password_hash', 32)
            ->allowEmpty('forgot_password_hash');

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    // public function findAuthMaster(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select(['id', 'email', 'pass'])
            ->where([
                // 'status' => 'Active',
                // 'subdomain' => $this->request->env('HTTP_HOST'),
                'subdomain' => $_SERVER['HTTP_HOST'],
            ]);
        return $query;
    }
}
