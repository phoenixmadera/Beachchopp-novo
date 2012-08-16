<?php
class UsersController extends AppController {

    var $name = 'Users';
		//var $uses = array('User', 'Log', 'Cliente', 'Funcionario', 'Produto');


	public function login(){
		if($this->Session->read('Auth.User') != null){
			$this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'painel')));
		}
		if ($this->data) {
			if ($this->Auth->login()) {
				$id = $this->Session->read('Auth.User.id');
				$this->User->read(null, $id);
				$this->User->saveField('last_login', date(DATE_ATOM)); 
				$this->request->data['User']['username'] = $this->Auth->user('username');
				//$this->salvaLog('O usuário logou-se.', $this->Session->read('Auth.User.username'));
				$this->redirect($this->Auth->redirect(array('controller' => 'users', 'action' => 'painel')));
			} else {
					$this->set('erro', true);
					$this->Session->setflash('Os dados informados estão incorretos. Por favor, tente novamente.');
				}
			}
	}
	
	function logout(){
		//$this->salvaLog('O usuário deslogou-se.', $this->Session->read('Auth.User.username'));
    	$this->redirect($this->Auth->logout());
    }
		
	function painel(){
		//$all_logs = $this->Log->find('all', array('limit' => '5', 'order' => 'Log.id DESC'));
		//$this->set('all_logs', $all_logs);
		//$total_clientes = $this->Cliente->find('count');
		//$this->set('total_clientes', $total_clientes);
		//$total_funcionarios = $this->Funcionario->find('count');
		//$this->set('total_funcionarios', $total_funcionarios);
		//$total_produtos = $this->Produto->find('count');
		//$this->set('total_produtos', $total_produtos);
	}
	
	
}

?>