<?php
/** @var \App\View\AppView $this */

$this->extend('app');
?>

<div class="row">
    <div class="col-md-9">
        <div class="content">
            <?= $this->fetch('content') ?>
        </div>
    </div>

    <div class="col-md-3">
        <?= $this->Menu->renderUserMenu() ?>
    </div>
</div>