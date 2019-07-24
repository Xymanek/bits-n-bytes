<?php /** @var \App\View\AppView $this */ ?>
<div class="panel-group">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h4 class="panel-title">
                <span>Personal dashboard</span>
            </h4>
        </div>
        <div class="panel-collapse collapse in">
            <ul class="list-group">
                <li class="list-group-item">
                    <?= $this->Html->link('Progress', [
                        'controller' => 'Personal',
                        'action' => 'progress',
                    ]) ?>
                </li>
                <li class="list-group-item">
                    <?= $this->Html->link('Transcript', [
                        'controller' => 'Personal',
                        'action' => 'transcript',
                    ]) ?>
                </li>
                <li class="list-group-item">
                    <?= $this->Html->link('Discussion board', [
                        'controller' => 'Personal',
                        'action' => 'discussion',
                    ]) ?>
                </li>
                <li class="list-group-item">
                    <?= $this->Html->link('Change password', [
                        'plugin' => 'CakeDC/Users',
                        'controller' => 'Users',
                        'action' => 'change-password',
                    ]) ?>
                </li>
            </ul>
        </div>
    </div>
</div>