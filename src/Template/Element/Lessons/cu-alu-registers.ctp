<?php /** @var \App\View\AppView $this */ ?>
<h1>CU, ALU and Registers</h1>

<div style="margin-bottom: 10px; border: black solid 1px" class="pull-right">
    <?= $this->Html->image('learn/cu-steps.png', ['class' => 'img-responsive']) ?>
</div>
<div class="pull-right" style="border: black solid 1px">
    <?= $this->Html->image('learn/cu-diagram.png', ['class' => 'img-responsive']) ?>
</div>

<h2>Control Unit (CU)</h2>
<p>
    The control unit is inside the CPU and is used to control the flow of data within the system. More detailed, the
    control unit (CU) handles all processors signals. It directs all input and output flow, fetches code for
    instructions from micro-programs and directs other units and models by providing control and timing signals.
</p>
<p>CU Functions:</p>
<ul>
    <li>Controls sequential instruction execution</li>
    <li>Interprets instructions</li>
    <li>Guides data flow through different computer areas</li>
    <li>Regulates and control processor timing</li>
    <li>Sends and receives control signals from other computer devices</li>
    <li>Handles tasks, such as fetching, decoding, execution, handling and storing results</li>
</ul>


<h2>Arithmetic/logic unit (ALU)</h2>
<p>
    The arithmetic logic unit (ALU) performs all arithmetic and logical operations within the CPU. It is a major
    component of the central processing unit (CPU) of a computer system
</p>
<p>ALU routinely performs:</p>
<ul>
    <li>Logical operations: these include AND,OR, NOT</li>
    <li>Logical comparisons</li>
    <li>
        Bit-shifting operations: this pertains to shifting the positions of the bits by a certain number of places to
        the right or left, which is considered a multiplication operation
    </li>
    <li>Arithmetic operations: this refers to bit addition and subtraction.</li>
</ul>



<h2>Registers</h2>
<p>
    Registers are used to quickly accept, store, and transfer data and instructions that are being used immediately by
    the CPU. A processor register (CPU register) is one of a small set of data holding places that are part of the
    computer processor. A register may hold an instruction, a storage address, or any kind of data (such as a bit
    sequence or individual characters). A register must be large enough to hold an instruction, for example, in a 64-bit
    computer; a register must be 64 bits in length.
</p>