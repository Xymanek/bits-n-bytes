<?php
use Cake\Core\Configure;

/**
 * @var \App\View\AppView               $this
 * @var \CakeDC\Users\Model\Entity\User $user
 */
$this->layout = 'auth';
?>

<?= $this->Form->create($user, ['templates' => ['inputContainer' => '{{content}}']]) ?>
    <div id="stacked-inputs">
        <h2>Register</h2>
        <?php
        echo $this->Form->input('username', ['label' => false, 'placeholder' => 'Username']);
        echo $this->Form->input('email', ['label' => false, 'placeholder' => 'Email']);
        echo $this->Form->input('password', ['label' => false, 'placeholder' => 'Password']);
        echo $this->Form->input('password_confirm', [
            'type' => 'password',
            'label' => false,
            'placeholder' => 'Confirm password'
        ]);
        echo $this->Form->input('first_name', ['label' => false, 'placeholder' => 'First name']);
        echo $this->Form->input('last_name', ['label' => false, 'placeholder' => 'Last name']);
        ?>
    </div>

<?php
if (Configure::read('Users.Tos.required')) {
    echo $this->Form->input('tos', [
        'type' => 'checkbox',
        'label' => 'I accept Terms Of Service',
        'required' => true
    ]);
}
if (Configure::read('Users.reCaptcha.registration')) {
    echo $this->User->addReCaptcha();
}
?>

<?= $this->Form->submit('Register', ['class' => 'btn-lg btn-primary btn-block']) ?>
<?= $this->Form->end() ?>

<?= $this->Html->link('Login', ['action' => 'login']) ?>