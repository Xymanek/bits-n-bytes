<?php
use App\Learning\LearningUI;

/**
 * @var \App\View\AppView $this
 * @var array             $path
 */

$icons = [
    LearningUI::STATUS_COMPLETED => '<i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i>',
    LearningUI::STATUS_CURRENT => '<i class="fa fa-arrow-right" aria-hidden="true"></i>',
    LearningUI::STATUS_LOCKED => '<i class="fa fa-lock" aria-hidden="true"></i>',
];
?>

<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <?php foreach ($path as $tier) : ?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab">
                <h4 class="panel-title">
                    <?= $icons[$tier['status']] ?>
                    <?php if ($tier['status'] === LearningUI::STATUS_LOCKED): ?>
                        <?= $tier['title'] ?>
                    <?php else: ?>
                        <a role="button" data-toggle="collapse" data-parent="#accordion"
                           href="#collapse-<?= $tier['id'] ?>" aria-expanded="false">
                            <?= $tier['title'] ?>
                        </a>
                    <?php endif; ?>
                </h4>
            </div>
            <div class="panel-collapse collapse<?php if ($tier['selected']): ?> in<?php endif ?>"
                 id="collapse-<?= $tier['id'] ?>" role="tabpanel">
                <ul class="list-group">
                    <?php foreach ($tier['steps'] as $step): ?>
                        <li class="list-group-item">
                            <?= $icons[$step['status']] ?>

                            <?php if ($step['selected']): ?>
                                <strong><?= $step['title'] ?></strong>
                            <?php elseif ($step['status'] === LearningUI::STATUS_LOCKED): ?>
                                <span class="text-muted"><?= $step['title'] ?></span>
                            <?php else: ?>
                                <a href="<?= $step['url'] ?>"><?= $step['title'] ?></a>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="panel panel-default">
    <div class="panel-collapse collapse in" role="tabpanel">
        <ul class="list-group">
            <li class="list-group-item">
                <?= $this->Html->link('Back to dashboard', [
                    'controller' => 'Personal',
                    'action' => 'progress',
                ]) ?>
            </li>
        </ul>
    </div>
</div>