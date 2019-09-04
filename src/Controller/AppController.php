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
    public $helpers = [
        'Less.Less', // required for parsing less files
        'BootstrapUI.Form',
        'BootstrapUI.Html',
        'BootstrapUI.Flash',
        'BootstrapUI.Paginator'
    ];

    // public $layout = 'Bootstrap.default';
    // public $layout = 'bs337';
    public $layout = 'bsd';
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
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent(
            'Flash' //,
            // 'Auth'
        );

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');

        // echo $this->request->getParam('prefix');
        // pr($this->request->getParam('prefix'));
        // pr($this->request->getParam('controller'));
        // exit;

        if ($this->request->getParam('prefix') == 'master' 
            // or $this->request->getParam('controller') == 'Masters'
        ) {
            // $this->Auth->__set('sessionKey','Auth.Master');
            $this->loadComponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'userModel' => 'Masters',
                        'fields' => [
                            'username' => 'email',
                            'password' => 'pass'
                        ],
                        'finder' => 'auth',
                        // 'finder' => 'authMaster',
                    ]
                ],
                'loginAction' => [
                    'prefix' => false,
                    'controller' => 'Masters',
                    'action' => 'login',
                ],
                // 'redirectUrl' => [
                //     'prefix' => true,
                //     'controller' => 'Lands',
                //     'action' => 'index',
                // ],
                'loginRedirect' => array(
                    'prefix' => 'master',
                    'controller' => 'Admins',
                    'action' => 'index',
                ),
                 //use isAuthorized in Controllers
                // 'authorize' => ['Controller'],
                 // If unauthorized, return them to page they were just on
                'unauthorizedRedirect' => $this->referer(),
                // 'storage' => 'Session',
                'storage' => [
                    'className' => 'Session',
                    'key' => 'Auth.Master'
                ]
                // 'sessionKey'=>'Auth.Master',
            ]);
        } // if prefix = master
        // else {
        elseif ($this->request->getParam('prefix') == 'admin') {
            // $this->Auth->__set('sessionKey','Auth.Admin');
            $this->loadComponent('Auth', [
                'authenticate' => [
                    'Form' => [
                        'userModel' => 'Admins',
                        'fields' => [
                            'username' => 'email',
                            'password' => 'pass'
                        ],
                        'finder' => 'auth',
                        // 'finder' => 'authAdmin',
                    ]
                ],
                'loginAction' => [
                    'prefix' => false,
                    'controller' => 'Admins',
                    'action' => 'login',
                ],
                // 'redirectUrl' => [
                //     'prefix' => true,
                //     'controller' => 'Lands',
                //     'action' => 'index',
                // ],
                'loginRedirect' => array(
                    'prefix' => 'admin',
                    'controller' => 'Lands',
                    'action' => 'index',
                ),
                 //use isAuthorized in Controllers
                // 'authorize' => ['Controller'],
                 // If unauthorized, return them to page they were just on
                'unauthorizedRedirect' => $this->referer(),
                // 'storage' => 'Session',
                'storage' => [
                    'className' => 'Session',
                    'key' => 'Auth.Admin'
                ]
                // 'sessionKey'=>'Auth.Admin',
            ]);
        } // else prefix = master
        
        // pr($this->Session->read('Auth.Admin'));
        // $AuthAdmin = $this->Session->read('Auth.Admin');
        // pr($AuthAdmin);
        // pr($this->Auth->user('id'));
        // pr($this->Auth->user());

        // if ($this->Session->read('Auth.Admin')) {
        //  die('if Session Auth.Admin');
        // }

        // $this->loadModel('PageElements');
        // $pageElements = $this->PageElements->find('list', [
        //     'conditions' => [
        //         'PageElements.admin_id' => $this->Auth->user('id')
        //     ],
        //     'limit' => 200,
        // ]);
        // pr($pageElements);

        // foreach ($pageElements as $pageElement) {
        //     pr($pageElement);
        // }

        // Above test code for page element don't work because user is not logged in
        // We need to read subdoamin & link with admin
        // So if user has page elements, show them
        // And if subdomain is available for signup, so available subdomain message

        $this->loadModel('Admins');
        $admin = $this->Admins
            ->find('all', [
                'fields' => [
                    'id',
                ],
                'conditions' => [
                    'subdomain' => $_SERVER['HTTP_HOST'],
                    // 'subdomain' => $_SERVER['HTTP_HOST'].'x',
                ],
                'limit' => 1,
            ])
            ->first();

        // pr($admin);
        // dd($admin);

        $conditions = array('PageElements.admin_id is null');
        $isAdmin = false;

        if (!empty($admin)) {
            // echo '<h1>$admin not empty</h1>';

            // $conditions['PageElements.admin_id'] = $admin->id;
            $conditions = array('PageElements.admin_id' => $admin->id);
            $isAdmin = true;
        }
        // else {
        //     $conditions['PageElements.admin_id is null'];
        // }

        $this->loadModel('PageElements');
        $pageElements = $this->PageElements->find('all', [
        // $pageElements = $this->PageElements->find('list', [
            // 'fields' => [
            //     'id',
            //     'type',
            //     'content',
            // ],
            'conditions' => // [
                // 'PageElements.admin_id' => !empty($admin) ? $admin->id : null,
                // 'PageElements.admin_id' => !empty($admin) ? $admin->id : '',
                // 'PageElements.admin_id' => !empty($admin) ? $admin->id : 'null',
                // 'PageElements.admin_id is null',
                // 'PageElements.admin_id' => !empty($admin) ? $admin->id : 'is null',
                // ],
                $conditions,
            // 'limit' => 200,
            'keyField' => 'type',
            'valueField' => 'content',
            // 'groupField' => 'type'
        ]);
        // $pageElements = $pageElements->all();
        // $pageElements = $pageElements->toList();
        $pageElements = $pageElements->toArray();
        // pr($pageElements);
        // dd($pageElements);

        $LogoImageURL = '/img/logo/logo32.png';
        $LogoText = 'MyLands.pk';

        foreach ($pageElements as $pageElement) {
            // pr($pageElement);

            switch ($pageElement->type) {
                case 'Logo Image URL':
                    $LogoImageURL = $pageElement->content;
                    break;

                case 'Logo Text':
                    $LogoText = $pageElement->content;
                    break;
            }
        }

        // else {
        //     echo '<h1>$admin is empty</h1>';
        // }

        $this->set(compact(
            // 'pageElements',
            'isAdmin',
            'LogoImageURL',
            'LogoText'//,
        ));
    } // initialize()
} // AppController
