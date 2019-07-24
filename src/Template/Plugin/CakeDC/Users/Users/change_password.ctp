<?php
/**
 * @var \App\View\AppView               $this
 * @var \CakeDC\Users\Model\Entity\User $user
 * @var bool                            $validatePassword
 */

$this->layout = 'auth';
?>

<?= $this->Form->create($user, ['templates' => ['inputContainer' => '{{content}}']]) ?>
<div id="stacked-inputs">
    <h2>Enter new password</h2>
    <?php if ($validatePassword) : ?>
        <?= $this->Form->input('current_password', [
            'type' => 'password',
            'required' => true,
            'label' => false,
            'placeholder' => __d('CakeDC/Users', 'Current password'),
        ]);
        ?>
    <?php endif; ?>
    <?= $this->Form->input('password', [
        'type' => 'password',
        'required' => true,
        'label' => false,
        'placeholder' => __d('CakeDC/Users', 'New password'),
    ]);
    ?>
    <?= $this->Form->input('password_confirm', [
        'type' => 'password',
        'required' => true,
        'label' => false,
        'placeholder' => __d('CakeDC/Users', 'Confirm password'),
    ]);
    ?>
</div>

<?= $this->Form->submit(__d('CakeDC/Users', 'Submit'), ['class' => 'btn-lg btn-primary btn-block']) ?>
<?= $this->Form->end() ?>

<?php if ($validatePassword) : ?>
    <?= $this->Html->link('Back to dashboard', [
        'plugin' => null,
        'controller' => 'Personal',
        'action' => 'progress',
    ])
    ?>
<?php endif; ?>
