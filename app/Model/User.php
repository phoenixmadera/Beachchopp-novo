<?php
//App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel{
  public $name = 'User';
 /* public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A username is required'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'A password is required'
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'super_admin', 'cliente')),
                'message' => 'Please enter a valid role',
                'allowEmpty' => false
            )
        )
    ); */
  public $useTable = 'users';

	/*public function beforeSave($options = array()) {
		$this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
		return true;
  }*/
} 
?>