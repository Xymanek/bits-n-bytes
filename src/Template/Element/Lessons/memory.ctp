<?php /** @var \App\View\AppView $this */ ?>
<h1>Memory</h1>

<p>
    <strong>RAM</strong>: Alternatively referred to as main memory, primary memory, or system memory, Random Access
    Memory (RAM) is a hardware device that allows information to be stored and retrieved on a computer. RAM is usually
    associated with DRAM, which is a type of memory module. Because information is accessed randomly instead of
    sequentially like it is on a CD or hard drive, the computer can access the data much faster. However, unlike ROM or
    the hard drive, RAM is a volatile memory and requires power to keep the data accessible. If the computer is turned
    off, all data contained in RAM is lost
</p>
<p>
    <strong>ROM</strong>: Short for Read-Only Memory, ROM is a storage medium that is used with computers and other
    electronic devices. As the name indicates, data stored in ROM may only be read. It is either modified with extreme
    difficulty or not at all. ROM is mostly used for firmware updates. A simple example of ROM is the cartridge used
    with video game consoles, which allows one system to run multiple games. Another example of ROM is EEPROM, which is
    a programmable ROM used for the computer BIOS, as shown in the picture below
</p>
<p>
    <strong>CACHE</strong>: Pronounced like the physical form of money, cache is a high-speed access area that can be a
    reserved section of main memory or storage device. The two main types of cache are <em>memory cache</em> and
    <em>disk cache</em>
</p>

<ul>
    <li>
        <strong>Memory cache</strong> is a portion of the high-speed static RAM (SRAM) and is effective because most
        programs access the same data or instructions repeatedly. By keeping as much of this information as possible in
        SRAM, the computer avoids accessing the slower DRAM, making the computer perform faster and more efficiently.
    </li>
    <li>
        Like memory caching, <strong>disk caching</strong> is used to access commonly accessed data. However, instead of
        using high-speed SRAM, a disk cache uses conventional main memory. The most recently accessed data from a disk
        is stored in a memory buffer. When a program needs to access data from the disk, it first checks the disk cache
        to see if the data is there. Disk caching can dramatically improve the performance of applications because
        accessing a byte of data in RAM can be thousands of times faster than accessing a byte of data on a hard drive.
    </li>
</ul>

<div>
    <?= $this->Html->image('learn/memory-devices.png', [
        'class' => 'img-responsive center-margin',
        'style' => 'margin-bottom: 10px'
    ]) ?>
</div>