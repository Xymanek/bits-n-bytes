<?php
use App\View\Helper\MenuHelper;

/** @var \App\View\AppView $this */
$this->layout = 'page';
$this->Menu->setCurrentPage(MenuHelper::ABOUT);
?>

<h2>Our Mission</h2>
To provide a suitable learning website to young Computing learners.

<h2>About Us</h2>
We are a group of students from [university] who are dedicated to promote an e-learning alternative
learning material for GCSE Computing students. Our prospective is to educate as many people for their benefit.

<h2>Developed By</h2>
[names]

<h2>Attributions</h2>
The following was reused in this application:

<ul>
    <li><?= $this->Html->link('http://ecomputernotes.com/fundamental/input-output-and-memory/list-various-input-and-output-devices') ?></li>
    <li><?= $this->Html->link('https://www.techwalla.com/articles/the-function-of-secondary-storage') ?></li>
    <li><?= $this->Html->link('http://www.webopedia.com/TERM/M/main_memory.html') ?></li>
    <li><?= $this->Html->link('http://www.computerhope.com/jargon/r/ram.htm') ?></li>
    <li><?= $this->Html->link('http://dbcreationsnet.blogspot.com.cy/2013/02/mass-storage-devices.html') ?></li>
    <li><?= $this->Html->link('http://www.edgefxkits.com/blog/embedded-systems-with-applications/') ?></li>
    <li><?= $this->Html->link('https://www.cs.umd.edu/class/sum2003/cmsc311/Notes/Overall/clock.html') ?></li>
    <li><?= $this->Html->link('https://www.techopedia.com/definition/303/control-bus') ?></li>
    <li><?= $this->Html->link('http://ecomputernotes.com/fundamental/introduction-to-computer') ?></li>
</ul>


