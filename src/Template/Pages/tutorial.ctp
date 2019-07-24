<?php
use App\View\Helper\MenuHelper;

/** @var \App\View\AppView $this */
$this->layout = 'page';
$this->Menu->setCurrentPage(MenuHelper::TUTORIAL);

$this->Html->css('flowplayer-skin.css', ['block' => true]);
$this->Html->script('flowplayer.min.js', ['block' => true]);
?>

<div class="flowplayer">
    <video>
        <source type="video/mp4" src="https://media.bits-n-bytes.tk/intro.mp4">
    </video>
</div>