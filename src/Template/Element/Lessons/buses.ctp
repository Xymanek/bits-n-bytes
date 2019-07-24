<?php /** @var \App\View\AppView $this */ ?>

<h1>Buses</h1>
<div class="pull-right">
    <?= $this->Html->image('learn/bus.jpg', ['class' => 'img-responsive']) ?>
</div>
<p>
    The majority of system buses are made up of 50 to 100 distinct lines for communication. The system bus consists of
    three types of buses:
</p>
<ul>
    <li><strong>Data Bus</strong>: Carries the data that needs processing</li>
    <li><strong>Address Bus</strong>: Determines where data should be sent</li>
    <li><strong>Control Bus</strong>: Determines data processing</li>
</ul>

<h2>Address bus</h2>
<p>
    The BUS upon which a computer's CENTRAL PROCESSING UNIT issues addresses to the memory system in order to read or
    write a word of data
</p>
<p>
    Address bus is a part of the computer system bus that is dedicated for specifying a physical address. It is a group
    of wires or lines that are used to transfer the addresses of Memory or I/O devices
</p>
<ul>
    <li>
        When the computer processor needs to read or write from or to the memory, it uses the address bus to specify the
        physical address of the individual memory block it needs to access (the actual data is sent along the data bus)
    </li>
    <li>
        More correctly, when the processor wants to write some data to the memory, it will assert the write signal, set
        the write address on the address bus and put the data on to the data bus
    </li>
</ul>
<p>
    Similarly, when the processor wants to read some data residing in the memory, it will assert the read signal and set
    the read address on the address bus. After receiving this signal, the memory controller will get the data from the
    specific memory block (after checking the address bus to get the read address) and then it will place the data of
    the memory block on to the data bus
</p>

<div class="pull-right">
    <?= $this->Html->image('learn/control-bus.gif', ['class' => 'img-responsive center-margin']) ?>
</div>

<h2>Data bus</h2>
<p>
    A data bus simply carries data. Typically, the same data bus is used for both read/write operations
</p>
<ul>
    <li>When it is a write operation, the processor will put the data (to be written) on to the data bus</li>
    <li>
        When it is the read operation, the memory controller will get the data from the specific memory block and put it
        in to the data bus
    </li>
</ul>

<h2>Control bus</h2>
<p>
    A control bus is a computer bus that is used by the CPU to communicate with devices that are contained within the
    computer. This occurs through physical connections such as cables or printed circuits
</p>

<div style="clear: both"></div>

<div class="embed-responsive embed-responsive-16by9">
    <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/TpFO6RUqFhY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>