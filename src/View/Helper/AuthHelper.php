<?php
namespace App\View\Helper;

use Cake\View\Helper;

/**
 * Auth helper
 */
class AuthHelper extends Helper
{
    /**
     * Default configuration.
     *
     * @var array
     */
    protected $_defaultConfig = [];

    /**
     * @var \Cake\Network\Session
     */
    protected $_session;

    public function user ($key = null)
    {
        return $this->request->session()->read($key == null ? 'Auth.User' : 'Auth.User.' . $key);
    }

    public function loggedIn (): bool
    {
        return $this->user() !== null;
    }
}
