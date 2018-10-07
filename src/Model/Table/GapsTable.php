<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gaps Model
 *
 * @method \App\Model\Entity\Gap get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gap newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gap[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gap|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gap|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gap patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gap[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gap findOrCreate($search, callable $callback = null, $options = [])
 */
class GapsTable extends Table
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

        $this->setTable('gaps');
        $this->setDisplayField('idGap');
        $this->setPrimaryKey('idGap');
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
            ->integer('idGap')
            ->allowEmpty('idGap', 'create');

        $validator
            ->integer('idPoll')
            ->requirePresence('idPoll', 'create')
            ->notEmpty('idPoll');

        $validator
            ->dateTime('startDate')
            ->requirePresence('startDate', 'create')
            ->notEmpty('startDate');

        $validator
            ->dateTime('endDate')
            ->requirePresence('endDate', 'create')
            ->notEmpty('endDate');

        return $validator;
    }
}
