<?php
/**
 * @var \App\View\AppView                       $this
 * @var string                                  $selected_id
 * @var string                                  $current_id
 * @var \App\Learning\Question\AbstractQuestion $question
 * @var bool|null                               $result
 * @var bool|null                               $retry
 * @var array                                   $hints
 * @var array                                   $progress
 */

$this->set(compact('selected_id', 'current_id'));
$nav_i = 1;
?>

<?php if ($result === true): ?>
    <div class="text-center" style="color: green">
        Correct!
    </div>
<?php elseif ($result === false && $retry === false): ?>
    <div class="text-center" style="color: red">
        Wrong!
    </div>
<?php elseif ($result === false): ?>
    <div class="text-center" style="color: red">
        Wrong, try again!
    </div>
<?php endif; ?>

    <nav class="text-center questions-progress">
        <ul class="pagination">
            <?php foreach ($progress as $id => $value): ?>
                <?php
                if ($id === $question->getId()) {
                    $class = 'active';
                } elseif ($value === true) {
                    $class = 'disabled correct';
                } elseif ($value === false) {
                    $class = 'disabled wrong';
                } else {
                    $class = 'disabled';
                }
                ?>

                <li class="<?= $class ?>"><a href="#"><?= $nav_i ?></a></li>

                <?php $nav_i++; ?>
            <?php endforeach; ?>
        </ul>
    </nav>

    <div class="question-text" style="text-align: center">
        <?= $question->getQuestion() ?>
    </div>

<?= $this->element('Questions/' . $question->getElement(), [
    'question' => $question,
    'result' => $result,
    'retry' => $retry,
]); ?>

<?php if (count($hints) > 0): ?>
    <div style="clear: both"></div>
    <h3>Hints: </h3>

    <ul>
        <?php foreach ($hints as $hint): ?>
            <li><?= $hint ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>