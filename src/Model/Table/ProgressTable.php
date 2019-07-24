<?php
namespace App\Model\Table;

use App\Learning\LearningPath;
use App\Model\Entity\Progress;
use Cake\Datasource\EntityInterface;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;

/**
 * Progress Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 *
 * @method Progress get($primaryKey, $options = [])
 * @method Progress newEntity($data = null, array $options = [])
 * @method Progress[] newEntities(array $data, array $options = [])
 * @method Progress|bool save(EntityInterface $entity, $options = [])
 * @method Progress patchEntity(EntityInterface $entity, array $data, array $options = [])
 * @method Progress[] patchEntities($entities, array $data, array $options = [])
 * @method Progress findOrCreate($search, callable $callback = null, $options = [])
 */
class ProgressTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize (array $config)
    {
        $this->setTable('progress');
        $this->setPrimaryKey(['user_id', 'step_id']);
        $this->setEntityClass(Progress::class);

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
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
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add([$this, 'checkStepID'], 'checkStepID');

        return $rules;
    }

    public function checkStepID (Progress $entity)
    {
        return LearningPath::hasStep($entity->step_id);
    }
}
