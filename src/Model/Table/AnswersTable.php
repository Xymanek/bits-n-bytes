<?php
namespace App\Model\Table;

use App\Model\Entity\Answer;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Answers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Attempts
 *
 * @method Answer get($primaryKey, $options = [])
 * @method Answer newEntity($data = null, array $options = [])
 * @method Answer[] newEntities(array $data, array $options = [])
 * @method Answer|bool save(EntityInterface $entity, $options = [])
 * @method Answer patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Answer[] patchEntities($entities, array $data, array $options = [])
 * @method Answer findOrCreate($search, callable $callback = null, $options = [])
 */
class AnswersTable extends Table
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

        $this->setTable('answers');
        $this->setDisplayField('attempt_id');
        $this->setPrimaryKey(['attempt_id', 'question_id']);

        $this->belongsTo('Attempts', [
            'foreignKey' => 'attempt_id',
            'joinType' => 'INNER'
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
        //$rules->add($rules->existsIn(['question_id'], 'Questions')); // TODO
        $rules->add($rules->existsIn(['attempt_id'], 'Attempts'));

        return $rules;
    }
}
