<?php
use App\View\Helper\MenuHelper as Menu;

/**
 * @var \App\View\AppView $this
 * @var string|false      $page
 */

$page = $page ?? false;
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li<?php if ($page === Menu::HOMEPAGE) : ?> class="active"<?php endif; ?>>
                    <?= $this->Html->link('Home', ['_name' => 'homepage']) ?>
                </li>
                <li<?php if ($page === Menu::ABOUT) : ?> class="active"<?php endif; ?>>
                    <?= $this->Html->link('About', ['controller' => 'Pages', 'action' => 'display', 'about']) ?>
                </li>
                <li<?php if ($page === Menu::CONTACT) : ?> class="active"<?php endif; ?>>
                    <?= $this->Html->link('Contact', ['controller' => 'Pages', 'action' => 'contact']) ?>
                </li>
                <li<?php if ($page === Menu::TUTORIAL) : ?> class="active"<?php endif; ?>>
                    <?= $this->Html->link('How to use the system', [
                        'controller' => 'Pages',
                        'action' => 'display',
                        'tutorial'
                    ]) ?>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php if (!$this->Auth->loggedIn()) : ?>
                    <li>
                        <?= $this->Html->link('Login or register', [
                            'plugin' => 'CakeDC/Users',
                            'controller' => 'Users',
                            'action' => 'login'
                        ]) ?>
                    </li>
                <?php else: ?>
                    <li<?php if ($page === Menu::DASHBOARD) : ?> class="active"<?php endif; ?>>
                        <?= $this->Html->link('Dashboard', [
                            'controller' => 'Personal',
                            'action' => 'progress',
                        ]) ?>
                    </li>
                    <li>
                        <?= $this->Html->link('Logout', [
                            'plugin' => 'CakeDC/Users',
                            'controller' => 'Users',
                            'action' => 'logout'
                        ]) ?>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
