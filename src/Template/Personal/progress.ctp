<?php
use App\Learning\LearningUI;
use App\View\Helper\MenuHelper;

/**
 * @var \App\View\AppView $this
 * @var array             $path
 * @var array             $badges
 */

$this->layout = 'personal';
$this->Menu->setCurrentPage(MenuHelper::DASHBOARD);

$icons = [
    LearningUI::STATUS_COMPLETED => '<i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i>',
    LearningUI::STATUS_CURRENT => '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
    LearningUI::STATUS_LOCKED => '<i class="fa fa-lock" aria-hidden="true"></i>',
];
?>
<div>
    <h2>Your progress</h2>
    <div class="row">
        <?php foreach ($badges as $badge): ?>
            <div class="col-md-4">
                <?= $this->Html->image('badges/' . $badge, ['class' => 'img-responsive center-margin']) ?>
            </div>
        <?php endforeach; ?>
    </div>

    <?php foreach ($path as $tier) : ?>
        <h3>
            <?= $icons[$tier['status']] ?>
            <?= $tier['title'] ?>
        </h3>
        <ul>
            <?php foreach ($tier['steps'] as $step): ?>
                <li>
                    <?= $icons[$step['status']] ?>

                    <?php if ($step['selected']): ?>
                        <a href="<?= $step['url'] ?>">
                            <strong><?= $step['title'] ?></strong>
                        </a>
                    <?php elseif ($step['status'] === LearningUI::STATUS_LOCKED): ?>
                        <span class="text-muted"><?= $step['title'] ?></span>
                    <?php else: ?>
                        <a href="<?= $step['url'] ?>"><?= $step['title'] ?></a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endforeach; ?>
</div>