<?php
/**
 * @var \App\View\AppView                           $this
 * @var \App\Learning\Question\MatchOptionsQuestion $question
 * @var bool|null                                   $result
 * @var bool|null                                   $retry
 */
?>

<?= $this->Form->create(null, ['align' => 'inline']) ?>
    <div class="row">
        <div class="col-md-6">
            <?php foreach (array_values($question->getLeft()) as $key => $item): ?>
                <div>
                    <?= $this->Form->control('answers.' . $key, [
                        'placeholder' => '0',
                        'style' => 'width: 37px',
                        'required' => true,
                        'disabled' => $retry === false,
                        'maxlength' => 1
                    ]) ?>

                    <?php
                    if (is_array($item)) {
                        $file = $item['file'];
                        unset($item['file']);

                        echo $this->Html->image('learn/questions/' . $file, $item);
                    } else {
                        echo $item;
                    }
                    ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="col-md-6 match-options-right">
            <ol>
                <?php foreach ($question->getRight() as $item): ?>
                    <li>
                        <?php
                        if (is_array($item)) {
                            $file = $item['file'];
                            unset($item['file']);

                            echo $this->Html->image('learn/questions/' . $file, $item);
                        } else {
                            echo $item;
                        }
                        ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>

        <div class="col-md-12 text-center" style="margin-bottom: 10px">
            <?php
            if ($retry === false) {
                echo $this->Html->link('Next ->', [], ['class' => 'btn btn-lg btn-primary']);
            } else {
                echo $this->Form->submit('Submit', ['class' => 'btn btn-lg btn-primary']); // TODO In middle
            }
            ?>
        </div>
    </div>

<?php
echo $this->Form->end();