<?php
use App\View\Helper\MenuHelper;

/**
 * @var \App\View\AppView           $this
 * @var \App\Model\Entity\Comment   $newComment
 * @var \App\Model\Entity\Comment[] $comments
 */

$this->layout = 'personal';
$this->Menu->setCurrentPage(MenuHelper::DASHBOARD);
?>
<div>
    <h2>Discussion board</h2>

    <?= $this->Form->create($newComment) ?>
    <?= $this->Form->control('content', ['label' => false, 'placeholder' => 'Your comment']) ?>
    <?= $this->Form->submit('Add comment') ?>
    <?= $this->Form->end() ?>

    <div class="comments">
        <?php if (count($comments) === 0): ?>
            No comments :(
        <?php else: ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment">
                    <div class="comment-meta">
                        <?= h($comment->user->first_name . ' ' . $comment->user->last_name) ?>
                        <?= $comment->created ?>
                    </div>
                    <div class="comment-content">
                        <?= $this->Text->autoParagraph($this->Text->autoLink(
                            $comment->content,
                            ['escape' => 'true']
                        )) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>