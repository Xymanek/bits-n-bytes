<?php
/**
 * @var \App\View\AppView $this
 * @var string            $selected_id
 * @var string            $current_id
 */
?>
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

    <title>Bits N Bytes</title>

    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>

    <?= $this->Html->css('style.css') ?>
</head>
<body>

<div id="page-wrap">
    <div class="container">
        <?= $this->Flash->render() ?>

        <div class="row">
            <div class="col-md-3">
                <?= $this->Menu->renderLessonMenu($selected_id, $current_id) ?>
            </div>

            <div class="col-md-9 lesson-content">
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <p class="text-muted">Copyright &copy; 2017 Bits N Bytes Inc. All right reserved</p>
    </div>
</footer>

<?= $this->Html->script('jquery-3.1.0.min.js') ?>
<?= $this->Html->script('bootstrap.min.js') ?>

<script>
    $('#accordion').find('a[href="#"]').click(function (e) {
        e.preventDefault();
    })
</script>

</body>
</html>