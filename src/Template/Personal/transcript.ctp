<?php
use App\View\Helper\MenuHelper;

/**
 * @var \App\View\AppView              $this
 * @var \App\Learning\TranscriptItem[] $attempts
 */

$this->layout = 'personal';
$this->Menu->setCurrentPage(MenuHelper::DASHBOARD);
?>
<div>
    <h2>Your transcript</h2>

    <?php if (count($attempts) === 0): ?>
        You have no completed test attempts
    <?php else: ?>
        <table class="table">
            <thead>
            <tr>
                <th>Test</th>
                <th>Correct / Total</th>
                <th>Started</th>
                <th>Finished</th>
                <th>Result</th>
            </tr>
            </thead>

            <?php foreach ($attempts as $attempt): ?>
                <tr class="transcript-item">
                    <td> <?= $attempt->getTitle() ?> </td>
                    <td><?= $attempt->getCorrect() ?>/<?= count($attempt->getAnswers()) ?></td>
                    <td><?= $attempt->getStartedAt() ?></td>
                    <td><?= $attempt->getCompletedAt() ?></td>
                    <td>
                        <div class="questions-progress">
                            <ul class="pagination" style="margin: 0">
                                <?php foreach ($attempt->getAnswers() as $key => $value): ?>

                                    <?php $class = 'disabled ' . ($value === true ? 'correct' : 'wrong'); ?>
                                    <li class="<?= $class ?>"><a href="#"><?= $key ?></a></li>

                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>