<?php
class Estado extends AppModel{

		public $name = 'Estado';
		public $useTable = 'states';
		public $hasMany = array(
        'Cidade' => array(
            'className'     => 'Cidade',
            'foreignKey'    => 'id_states',
						'dependent' => true
						)
				);
		
} 
?>