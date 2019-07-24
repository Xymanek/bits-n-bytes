<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Progress Entity
 *
 * @property string                          $user_id
 * @property string                          $step_id
 * @property \Cake\I18n\Time                 $completed_at
 *
 * @property \CakeDC\Users\Model\Entity\User $user
 */
class Progress extends Entity
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
        '*' => false
    ];
}
