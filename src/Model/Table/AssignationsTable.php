<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Assignations Model
 *
 * @method \App\Model\Entity\Assignation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Assignation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Assignation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Assignation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assignation|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Assignation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Assignation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Assignation findOrCreate($search, callable $callback = null, $options = [])
 */
class AssignationsTable extends Table
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

        $this->setTable('assignations');
        $this->setDisplayField('idGap');
        $this->setPrimaryKey(['idGap', 'idUser']);
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
            ->integer('idUser')
            ->allowEmpty('idUser', 'create');

        $validator
            ->integer('idGap')
            ->allowEmpty('idGap', 'create');

        return $validator;
    }
}
