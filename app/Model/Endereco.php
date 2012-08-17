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

		public function controlAdd($check){
			$type = $check['Endereco']['type'];
					switch($type){
						case 'P':
							$check['Pais']['des'] = $check['Endereco']['des'];
							return $check;
						break;
						case 'E':
							$check['Estado']['des'] = $check['Endereco']['des'];
							$check['Estado']['id_countries'] = $check['Endereco']['countries'];
							return $check;
						break;
						case 'C':
							$check['Cidade']['des'] = $check['Endereco']['des'];
							if(!isset($check['Endereco']['states'])){
								$this->set('error', true);
								return false;
							}
							$check['Cidade']['id_states'] = $check['Endereco']['states'];
							return $check;
						break;
					}

		}
		
} 
?>