<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Form\ContactForm;
use Cake\Core\Configure;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link http://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{
    protected function init ()
    {
        $this->Auth->allow();
    }

    /**
     * Displays a view
     *
     * @param string[] ...$path Path segments.
     * @return \Cake\Http\Response|null
     *
     * @throws \Cake\Network\Exception\ForbiddenException When a directory traversal attempt.
     * @throws \Cake\Network\Exception\NotFoundException When the view file could not
     *   be found or \Cake\View\Exception\MissingTemplateException in debug mode.
     */
    public function display (...$path)
    {
        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        if (in_array('..', $path, true) || in_array('.', $path, true)) {
            throw new ForbiddenException();
        }
        $page = $subpage = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        $this->set(compact('page', 'subpage'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingTemplateException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }

            throw new NotFoundException();
        }
    }

    public function contact ()
    {
        $form = new ContactForm();

        if ($this->request->is('post')) {
            if ($form->execute($this->request->getData())) {
                $this->Flash->success('We will get back to you soon');

                return $this->redirect([]);
            } else {
                $this->Flash->error('There was a problem submitting your form');
            }
        } elseif ($this->Auth->user() !== null) {
            $this->request = $this->request
                ->withData('first_name', $this->Auth->user('first_name'))
                ->withData('last_name', $this->Auth->user('last_name'))
                ->withData('email', $this->Auth->user('email'));
        }

        $this->set('form', $form);
    }
}
