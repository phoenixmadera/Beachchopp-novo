<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
	var $helpers = array ('Html', 'Form', 'Session', 'Js' => array('Jquery'));
    public $components = array(
                               'Acl',
                               'Auth' => array(
                                               'loginAction' => array(
                                                                      'controller' => 'users',
                                                                      'action' => 'login',
                                                                      ),
                                               'authError' => 'Operação não permitida.',
                                               'authenticate' => array(
                                                                       'Form' => array(
                                                                       'userModel' => 'User',
                                                                       'fields' => array(
                                                                                          'username' => 'username', 
                                                                                          'password' => 'password')
                                                                                       )
                                                                       )
                                               ), 'Session', 'RequestHandler'
                               );
		function beforeFilter() {
      $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
      $this->Auth->loginError = 'Nome de usuario ou senha não conferem!';
      $this->Auth->autoRedirect   = false;
      $this->Auth->authorize = 'Controller';
      $this->Auth->fields = array('username' => 'username', 'password' => 'password');
      //$this->Auth->allow('galerialista', 'quemsomos', 'servicos', 'localizacao', 
      //                   'index', 'login', 'admin_login', 'cadastro', 'home', 'zoom',
			//									 'tabela_valores'
      //                   );
    }
		
		function isAuthorized() {
      $data['User'] = $this->Auth->user();
      if ($data['User']['role'] == 'super_admin') {
        $this->Auth->allow('admin_login', 'admin_painel', 'admin_logout', 'admin_edit', 'admin_lista');
				$this->Auth->deny('painel');
				return true;
      } 
      if($this->action != 'admin_painel' && $data['User']['role'] == 'cliente'){
				$this->Auth->deny('admin_painel');
        $this->Auth->allow('painel', 'execucao');
				return true;
      } 
      return false; 
		}

		public function getCurrentUser($field = null){
			if($field){
				return $this->Session->read('Auth.User.'.$field);
			} else {
				return $this->Session->read('Auth.User');
			}
		}
		
		public function getCurrentDateTime(){
			return date(DATE_ATOM);
		}
}
