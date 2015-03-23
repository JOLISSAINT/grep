<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *+
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    //...
	
	// Appel au template TeamPong - commenter pour retourner au default:
	public $theme = 'TeamPong';
	
	var $createPlaceTournament = 1;
	var $createPlace = 0;
	
    public $components = array(
        'Session',
        'Auth' => array(
			//Redirect le login et logout sur les controllers et page
            'loginRedirect' => array('controller' => 'tournaments', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
			'authenticate' => array(
				'Form' => array(
					//Changement de config de base de cakePHP. Email devient la convention de nommage pour les adresses
					'fields' => array('username' => 'email')
				)
			)
        )
    );

    public function beforeFilter() {
		/*switch ($this->name) {
        case 'Tournaments':
            $this->Auth->allow('index');
            break;
		}*/
		$this->Auth->allow('index');
    }
    //...
	
	public function beforeRender() {
		$this->response->disableCache();
	}
	
}
?>