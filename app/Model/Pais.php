<?php
class Pais extends AppModel{

		public $name = 'Pais';
		public $useTable = 'countries';
		public $hasMany = array(
        'Estado' => array(
            'className'     => 'Estado',
            'foreignKey'    => 'id_countries',
						'dependent' => true
						)
				);
		
} 
?>