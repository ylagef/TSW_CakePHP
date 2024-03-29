<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\I18n\I18n;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public function beforeFilter(Event $event)
    {
         $this->Auth->allow('changeLanguage');
    }

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Flash',[
                'class' => 'alert alert-danger text-center error',
                'role'=>'alert'
        ]
        );
        
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                'controller' => 'Polls',
                'action' => 'index'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ]
        ]);
    }

    

    public function changeLanguage($lang='es_ES'){
        I18n::setLocale($lang);
        
        $this->response = $this->response->withCookie('lang', [
            'value' => $lang,
            'path' => '/',
            'httpOnly' => true,
            'secure' => false,
            'expire' => strtotime('+1 year')
        ]);

        return $this->redirect($this->request->referer());
    }
}
