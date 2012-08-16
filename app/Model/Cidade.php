<?php
class Cidade extends AppModel{

		public $name = 'Cidade';
		public $useTable = 'cities';
		public $hasMany = array(
        'Bairro' => array(
            'className'     => 'Bairro',
            'foreignKey'    => 'id_cities',
						'dependent' => true
						)
				);
		
} 
?>