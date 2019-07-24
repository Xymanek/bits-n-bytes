<?php
namespace App\Model\Table;

use App\Model\Entity\Attempt;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Attempts Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\HasMany   $Answers
 *
 * @method Attempt get($primaryKey, $options = [])
 * @method Attempt newEntity($data = null, array $options = [])
 * @method Attempt[] newEntities(array $data, array $options = [])
 * @method Attempt|bool save(EntityInterface $entity, $options = [])
 * @method Attempt patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Attempt[] patchEntities($entities, array $data, array $options = [])
 * @method Attempt findOrCreate($search, callable $callback = null, $options = [])
 */
class AttemptsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize (array $config)
    {
        parent::initialize($config);

        $this->setTable('attempts');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Answers', [
            'foreignKey' => 'attempt_id'
        ]);
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
        //$rules->add($rules->existsIn(['step_id'], 'Steps')); // TODO
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
