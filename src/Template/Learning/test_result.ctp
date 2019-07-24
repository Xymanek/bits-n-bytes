<?php
/**
 * @var \App\View\AppView               $this
 * @var string                          $selected_id
 * @var string                          $current_id
 *
 * @var bool                            $failed
 * @var array                           $result
 * @var \App\Learning\Test\AbstractTest $test
 * @var bool                            $badgeGranted
 */

$this->set(compact('selected_id', 'current_id'));
?>
<div>
    <?php if ($failed): ?>
        <h2 class="text-center text-success">
            You have failed the <?= $test->getTitle() ?>
        </h2>
    <?php else: ?>
        <h2 class="text-center text-success">
            You have completed the <?= $test->getTitle() ?>
        </h2>
    <?php endif; ?>

    <?php if ($badgeGranted): ?>
        <h2 class="text-center text-success">
            You got a badge:
        </h2>
        <?= $this->Html->image('badges/' . $test->getBadgeCompleted(), ['class' => 'img-responsive center-margin']) ?>
    <?php endif; ?>

    <h3>Results:</h3>
    <?php foreach ($result as $question => $isCorrect): ?>
        <p class="<?= $isCorrect ? 'text-success' : 'text-danger' ?>">
            <?php if ($isCorrect): ?>
                <i class="fa fa-check-circle" aria-hidden="true" style="color: green"></i>
            <?php else: ?>
                <i class="fa fa-times-circle" aria-hidden="true" style="color: red"></i>
            <?php endif; ?>

            <?= $question ?>
        </p>
    <?php endforeach; ?>

    <div class="col-md-12 text-center" style="margin-bottom: 10px">
        <?= $this->Form->create() ?>
        <?= $this->Form->submit('Next ->', ['class' => 'btn btn-lg btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
</div>