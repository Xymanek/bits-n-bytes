<?php
namespace App\Model\Table;

use App\Model\Entity\Badge;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Badges Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Steps
 *
 * @method Badge get($primaryKey, $options = [])
 * @method Badge newEntity($data = null, array $options = [])
 * @method Badge[] newEntities(array $data, array $options = [])
 * @method Badge|bool save(EntityInterface $entity, $options = [])
 * @method Badge patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Badge[] patchEntities($entities, array $data, array $options = [])
 * @method Badge findOrCreate($search, callable $callback = null, $options = [])
 */
class BadgesTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize (array $config)
    {
        $this->setTable('badges');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey(['user_id', 'step_id']);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault (Validator $validator)
    {
        $validator
            ->dateTime('unlocked_at')
            ->requirePresence('unlocked_at', 'create')
            ->notEmpty('unlocked_at');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules (RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        //$rules->add($rules->existsIn(['step_id'], 'Steps'));

        return $rules;
    }
}
