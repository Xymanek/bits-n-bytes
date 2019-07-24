<?php
/** @var \App\View\AppView $this */
$this->layout = 'auth';
?>

<?= $this->Form->create('User', ['templates' => ['inputContainer' => '{{content}}']]) ?>

    <div id="stacked-inputs">
        <h2 class="form-signin-heading">Reset password</h2>
        <?= $this->Form->input('reference', ['label' => false, 'placeholder' => 'Your email']) ?>
    </div>

<?= $this->Form->submit('Send reset email', ['class' => 'btn-lg btn-primary btn-block']); ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Login', ['action' => 'login']) ?>