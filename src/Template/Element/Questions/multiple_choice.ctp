<?php
/**
 * @var \App\View\AppView                             $this
 * @var \App\Learning\Question\MultipleChoiceQuestion $question
 * @var bool|null                                     $result
 * @var bool|null                                     $retry
 */

$answers = [];
foreach ($question->getAnswers() as $key => $answer) {
    $color = null;

    if ($retry === false) {
        if ($result !== null && $question->getCorrect() === $key) {
            $color = 'green';
        }
        if ($result === false && $this->request->getData('answer') === $key) {
            $color = 'red';
        }
    }

    if (is_array($answer)) {
        $file = $answer['file'];
        unset($answer['file']);

        $answer = $this->Html->image('learn/questions/' . $file, $answer);
    }

    if ($color !== null) {
        $arr = [
            'text' => '<span style="color: ' . $color . '">' . $answer . '</span>'
        ];
    } else {
        $arr = ['text' => $answer];
    }

    $answers[] = $arr;
}
?>

    <div>
        <?php
        echo $this->Form->create(null, [
            'templates' => [
                'radio' => '<input type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
                'radioWrapper' => '<div class=" col-md-6"><div class="radio">{{label}}</div></div>'
            ]
        ]);
        echo $this->Form->radio('answer', $answers, [
            'class' => 'some-class',
            'label' => ['class' => 'label-class'],
            'escape' => false,
            'disabled' => $retry === false,
            'required' => true
        ]);
        ?>

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