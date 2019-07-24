<?php
/**
 * @var \App\View\AppView                       $this
 * @var string                                  $selected_id
 * @var string                                  $current_id
 * @var \App\Learning\Question\AbstractQuestion $question
 * @var bool|null                               $result
 * @var array                                   $progress
 */

$this->set(compact('selected_id', 'current_id'));
?>

    <nav class="text-center questions-progress">
        <ul class="pagination">
            <?php foreach (array_keys($progress) as $key => $id): ?>
                <?php
                if ($id === $question->getId()) {
                    $class = 'active';
                } else {
                    $class = 'disabled';
                }
                ?>

                <li class="<?= $class ?>"><a href="#"><?= $key + 1 ?></a></li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <div class="question-text" style="text-align: center">
        <?= $question->getQuestion() ?>
    </div>

<?php
echo $this->element('Questions/' . $question->getElement(), [
    'question' => $question,
    'result' => $result,
    'retry' => null,
]);