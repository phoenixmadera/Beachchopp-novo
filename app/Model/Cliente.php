<?php
class Cliente extends AppModel{
  public $name = 'Cliente';
  public $useTable = 'customers';
	public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => false
            )
				),
				'last_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => false
            )
				),
				'cpf' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => false
            )
				),
				'cnpj' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => false
            )
				),
				'phone' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => false
            )
				),
				'mobile' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => false
            )
				)
			);

} 
?>