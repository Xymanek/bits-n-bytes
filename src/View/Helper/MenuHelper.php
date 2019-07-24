<?php
namespace App\View\Helper;

use App\Learning\LearningUI;
use Cake\View\Helper;

/**
 * Menu helper
 */
class MenuHelper extends Helper
{
    // Pages
    const HOMEPAGE = 'homepage';
    const ABOUT = 'about';
    const CONTACT = 'contact';
    const TUTORIAL = 'tutorial';
    const DASHBOARD = 'dashboard';

    /**
     * Current page identifier to be used by menu
     *
     * @var string|false
     */
    protected $currentPage = false;

    /**
     * A list of valid page identifiers
     *
     * @var array
     */
    protected $allowedPages = [
        self::HOMEPAGE,
        self::ABOUT,
        self::CONTACT,
        self::TUTORIAL,
        self::DASHBOARD,
    ];

    /**
     * Set current page in order to be used by main menu
     *
     * Call with no argument in order to reset
     *
     * @param string $page
     * @return void
     *
     * @throws \InvalidArgumentException If page identifier isn't recognised
     */
    public function setCurrentPage (string $page = null)
    {
        if ($page === null) {
            $this->currentPage = false;
        } else {
            if (!in_array($page, $this->allowedPages, true)) {
                throw new \InvalidArgumentException('This page is not known');
            }

            $this->currentPage = $page;
        }
    }

    public function renderMainMenu (): string
    {
        return $this->_View->element('Menu/main', ['page' => $this->currentPage]);
    }

    public function renderUserMenu (): string
    {
        return $this->_View->element('Menu/user');
    }

    public function renderLessonMenu (string $selected, string $current = null): string
    {
        return $this->_View->element('Menu/lesson', [
            'path' => LearningUI::buildNestedList($selected, $current)
        ]);
    }
}
