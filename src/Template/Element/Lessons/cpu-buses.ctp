<?php /** @var \App\View\AppView $this */ ?>
<h1>CPU and the control bus</h1>

<p>
    The CPU transmits a variety of control signals to components and devices to transmit control signals to the CPU
    using the control bus. One of the main objectives of a bus is to minimize the lines that are needed for
    communication. An individual bus permits communication between devices using one data channel. The control bus is
    bidirectional and assists the CPU in synchronizing control signals to internal devices and external components. It
    is comprised of interrupt lines, byte enable lines, read/write signals and status lines
</p>
<p>
    Although a CPU can have its own distinctive set of control signals, some controls are common to all CPUs:
</p>

<ul>
    <li>
        <strong>Interrupt Request (IRQ) Lines</strong>: Hardware line used by devices to interrupt signals to the CPU.
        It allows the CPU to interrupt its current job to process the present request
    </li>
    <li>
        <strong>System Clock Control Line</strong>: Delivers the internal timing for various devices on the motherboard
        and CPU
    </li>
</ul>

<p>
    Communication between the CPU and control bus <strong>is necessary</strong> for running a proficient and functional
    system. Without the control bus the CPU cannot determine whether the system is receiving or sending data. It is the
    control bus that regulates which direction the write and read information need to go. The control bus contains a
    control line for write instructions and a control line for read instructions. When the CPU writes data to the main
    memory, it transmits a signal to the write command line. The CPU also sends a signal to the read command line when
    it needs to read. This signal permits the CPU to receive or transmit data from main memory
</p>

<div class="embed-responsive embed-responsive-16by9" style="margin-bottom: 10px">
    <iframe class="embed-responsive-item" src="https://www.youtube-nocookie.com/embed/J3IU9EUiVXY?rel=0&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
</div>