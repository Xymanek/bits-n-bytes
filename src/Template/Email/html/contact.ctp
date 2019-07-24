<?php /** @var array $data */ ?>

<strong>First name</strong>: <?= $data['first_name'] ?><br>
<strong>Last name</strong>: <?= $data['last_name'] ?><br>
<strong>Email</strong>: <?= $data['email'] ?><br>

<p>
    <?= h($data['message']) ?>
</p>