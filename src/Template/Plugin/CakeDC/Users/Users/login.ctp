<?php
use Cake\Core\Configure;

/** @var \App\View\AppView $this */
$this->layout = 'auth';
?>

<?= $this->Form->create(null, ['templates' => ['inputContainer' => '{{content}}']]) ?>

    <div id="stacked-inputs">
        <h2 class="form-signin-heading">Login</h2>
        <?= $this->Form->input('username', ['required' => true, 'label' => false, 'placeholder' => 'Username']) ?>
        <?= $this->Form->input('password', ['required' => true, 'label' => false, 'placeholder' => 'Password']) ?>
        <?php
        if (Configure::read('Users.reCaptcha.login')) {
            echo $this->User->addReCaptcha();
        }
        if (Configure::read('Users.RememberMe.active')) {
            echo $this->Form->input(Configure::read('Users.Key.Data.rememberMe'), [
                'type' => 'checkbox',
                'label' => __d('CakeDC/Users', 'Remember me'),
                'checked' => 'checked'
            ]);
        }
        ?>
    </div>

<?= implode(' ', $this->User->socialLoginList()); ?>
<?= $this->Form->submit(__d('CakeDC/Users', 'Login'), ['class' => 'btn-lg btn-primary btn-block']); ?>
<?= $this->Form->end() ?>

<?php
echo $this->Html->link('Home', ['_name' => 'homepage']);

if (Configure::read('Users.Registration.active')) {
    echo ' | ';
    echo $this->Html->link(__d('CakeDC/Users', 'Register'), ['action' => 'register']);
}

if (Configure::read('Users.Email.required')) {
    echo ' | ';
    echo $this->Html->link(__d('CakeDC/Users', 'Reset Password'), ['action' => 'requestResetPassword']);
}
?>