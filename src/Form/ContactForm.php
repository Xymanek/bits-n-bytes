<?php
namespace App\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Mailer\Email;
use Cake\Validation\Validator;

/**
 * Contact Form.
 */
class ContactForm extends Form
{
    /**
     * Builds the schema for the modelless form
     *
     * @param \Cake\Form\Schema $schema From schema
     * @return \Cake\Form\Schema
     */
    protected function _buildSchema (Schema $schema)
    {
        return $schema
            ->addField('first_name', 'string')
            ->addField('last_name', 'string')
            ->addField('email', 'email')
            ->addField('message', 'text');
    }

    /**
     * Form validation builder
     *
     * @param \Cake\Validation\Validator $validator to use against the form
     * @return \Cake\Validation\Validator
     */
    protected function _buildValidator (Validator $validator)
    {
        return $validator
            ->requirePresence([
                'first_name',
                'last_name',
                'email',
                'message',
            ])
            ->notEmpty('first_name')
            ->notEmpty('last_name')
            ->notEmpty('email')
            ->email('email')
            ->notEmpty('message')
            ->minLength('message', 5);
    }

    /**
     * Defines what to execute once the From is being processed
     *
     * @param array $data Form data.
     * @return bool
     */
    protected function _execute (array $data)
    {
        $email = new Email();
        $email
            ->setTo('xymanek@example.com')
            ->setSubject('Bits N Bytes contact form submission')
            ->setReplyTo($data['email'])
            ->setEmailFormat('html')
            ->setLayout(null)
            ->setTemplate('contact')
            ->setViewVars(compact('data'))
            ->send();

        return true;
    }
}
