<?php
use App\View\Helper\MenuHelper;

/**
 * @var \App\View\AppView     $this
 * @var \App\Form\ContactForm $form
 */

$this->layout = 'page';
$this->Menu->setCurrentPage(MenuHelper::CONTACT);

echo $this->Form->create($form);
echo $this->Form->control('first_name');
echo $this->Form->control('last_name');
echo $this->Form->control('email');
echo $this->Form->control('message');
echo $this->Form->submit('Send', ['class' => 'btn btn-primary']);
echo $this->Form->end();