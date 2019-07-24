<?php /** @var \App\View\AppView $this */ ?>
<h1>Internal clock</h1>

<p>
    <strong>Internal clock</strong> is a signal that used to synchronize things inside the computer. The begging of each
    clock cycle is when the clock signal goes from 0 to 1, marked with an arrow like the picture below:
</p>
<div>
    <?= $this->Html->image('learn/clock.gif', ['class' => 'img-responsive center-margin']) ?>
</div>
<p>
    All things in computing are measured in terms of clock cycles. Cycles per second are measure in Hertz (Hz). A GHz
    (gigahertz) is 1000 million cycles per second
</p>
<div>
    <?= $this->Html->image('learn/clock-cycle.gif', ['class' => 'img-responsive center-margin']) ?>
</div>
<ul>
    <li>
        <strong>Period</strong>: This is the time it takes for a clock signal to repeat. Its unit of measurement is
        seconds. The symbol for the period is T
    </li>
    <li>
        <strong>Frequency</strong>: Frequency is 1/T. The unit of measurement is s-1, which is inverse seconds. This is
        also sometimes called Hertz (abbreviated Hz). Sometimes people say "cycles per second" instead of Hz or s-1.
        They all mean the same. When people refer to the "speed" of a CPU, they are usually talking about the clock
        frequency
    </li>
    <li><strong>Positive edge</strong>: When the signal transitions from 0 to 1</li>
    <li><strong>Negative edge</strong>: When the signal transitions from 1 to 0</li>
</ul>