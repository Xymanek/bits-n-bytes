<?php /** @var \App\View\AppView $this */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg">
    <meta name="theme-color" content="#ffffff">

    <title>Bits N Bytes | Login</title>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('auth.css') ?>
</head>
<body>

<div class="container">
    <div class="form-signin">
        <?= $this->Html->image('logo.png', ['class' => 'img-responsive']) ?>
        <?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
</div>

<?= $this->Html->script('jquery-3.1.0.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>

</body>
</html>
