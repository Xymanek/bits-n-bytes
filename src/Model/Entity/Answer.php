<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Answer Entity
 *
 * @property string                    $question_id
 * @property int                       $attempt_id
 * @property \Cake\I18n\Time           $completed_at
 * @property bool                      $correct
 *
 * @property \App\Model\Entity\Attempt $attempt
 */
class Answer extends Entity
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
        '*' => false,
    ];
}
