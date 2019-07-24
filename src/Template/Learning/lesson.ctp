<?php
/**
 * @var \App\View\AppView $this
 * @var string            $selected_id
 * @var string            $current_id
 */

$this->set(compact('selected_id', 'current_id'));

echo $this->element('Lessons/' . $selected_id);

echo '<div class="col-md-12 text-center" style="margin-bottom: 10px">';

echo $this->Form->create();
echo $this->Form->submit('Next ->', ['class' => 'btn btn-lg btn-primary']);
echo $this->Form->end();

echo '</div>';