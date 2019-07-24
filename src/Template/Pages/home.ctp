<?php
use App\View\Helper\MenuHelper;

/** @var \App\View\AppView $this */
$this->layout = 'page';
$this->Menu->setCurrentPage(MenuHelper::HOMEPAGE);
?>

<?= $this->Html->image('elearning.png', ['class' => 'img-responsive center-margin']) ?>

<p class="text-center">
    You only need to know one thing:
</p>
<p class="text-center">
    You can learn anything
</p>

<blockquote>
    <p>
        “eLearning shouldn’t be a casual joy ride on a Sunday afternoon with the cruise control engaged. <br>
        The sole purpose of eLearning is to teach.”
    </p>
</blockquote>


<p class="text-center">
    <?= $this->Html->link(
        'Start learning',
        [
            'controller' => 'Personal',
            'action' => 'progress',
        ],
        ['class' => 'btn btn-lg btn-primary']
    ); ?>
</p>