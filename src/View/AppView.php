<?php
namespace App\View;

use Cake\View\View;

/**
 * Application View
 *
 * Your application’s default view class
 *
 * @property \BootstrapUI\View\Helper\HtmlHelper      $Html
 * @property \BootstrapUI\View\Helper\FormHelper      $Form
 * @property \BootstrapUI\View\Helper\FlashHelper     $Flash
 * @property \BootstrapUI\View\Helper\PaginatorHelper $Paginator
 *
 * @property \CakeDC\Users\View\Helper\UserHelper     $User
 * @property \CakeDC\Users\View\Helper\AuthLinkHelper $AuthLink
 *
 * @property \App\View\Helper\AuthHelper              $Auth
 * @property \App\View\Helper\MenuHelper              $Menu
 */
class AppView extends View
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading helpers.
     *
     * e.g. `$this->loadHelper('Html');`
     *
     * @return void
     */
    public function initialize ()
    {
        $this->loadHelper('Html', ['className' => 'BootstrapUI.Html']);
        $this->loadHelper('Form', ['className' => 'BootstrapUI.Form']);
        $this->loadHelper('Flash', ['className' => 'BootstrapUI.Flash']);
        $this->loadHelper('Paginator', ['className' => 'BootstrapUI.Paginator']);

        $this->loadHelper('CakeDC/Users.User');
        $this->loadHelper('CakeDC/Users.AuthLink');

        $this->loadHelper('Auth');
        $this->loadHelper('Menu');
    }
}
