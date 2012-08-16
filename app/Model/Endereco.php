<?php
class Endereco extends AppModel{

		public $name = 'Endereco';
		public $useTable = 'adresses';
		public $validate = array(
				'states' => array(
							 'required' => array(
										'rule' => array('notEmpty'), 
										'message' => false
							 ) 
				),
				'des' => array(
						'required' => array(
						'rule' => array('notEmpty'),
						'message' => false
            )
				),
		);
		public $hasMany = array(
        'EnderecoCliente' => array(
            'className'     => 'EnderecoCliente',
            'foreignKey'    => 'id_adresses',
						'dependent' => true
						)
				);
		
} 
?>