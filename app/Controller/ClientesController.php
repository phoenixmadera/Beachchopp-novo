<?php
class ClientesController extends AppController {

		var $name = 'Clientes';
    var $uses = array('Cliente', 'Endereco', 'TipoEndereco', 'Pais', 'Estado', 'Cidade', 'EnderecoCliente');

		public function adiciona(){
			//População dos campos SELECT do formulário de endereço:
				//Pais
					$countries = $this->Pais->find('list', array('fields' => 'Pais.des'));
					$this->set('countries', $countries);
				//Estados
					$states = $this->Estado->find('list', array('fields' => array('Estado.id', 'Estado.des', 'Estado.id_countries')));
					$this->set('states', $states);
				//Cidades
					$cities = $this->Cidade->find('list', array('fields' => array('Cidade.id', 'Cidade.des', 'Cidade.id_states')));
					$this->set('cities', $cities);
				//Tipos de Endereço
					$type_adresses = $this->TipoEndereco->find('list', array('fields' => array('TipoEndereco.id', 'TipoEndereco.des')));
					$this->set('type_adresses', $type_adresses);
				//Lista de Clientes
					$customers = $this->Cliente->find('list', array('fields' => array('Cliente.id', 'Cliente.des')));
					$this->set('customers', $customers);
			if($this->data){
				$conditions = array("TipoEndereco.des" => $this->data['Cliente']['type_addresses']);
				$type_adresses_id = $this->TipoEndereco->find('first', array('conditions' => $conditions,
																																		 'fields' => array('TipoEndereco.id')));
				$this->Cliente->set($this->data);
				if($this->Cliente->validates()){
					if($this->Cliente->save($this->data)){
						//Preenche a array e ve quantos endereços existem.
						$aux = (sizeof($this->data) - 1);
						//Aqui tem q salvar o id_type_adress
						for($i = 1; $i <= $aux; $i++){
							$this->request->data['Endereco'.$i]['id_type_adress'] = $type_adresses_id['TipoEndereco']['id'];
							$this->request->data['Endereco'.$i]['id_neighborhood'] = $this->data['Endereco'.$i]['neighborhood'];
							if($this->Endereco->save($this->data['Endereco'.$i])){
								$this->EnderecoCliente->set(array('id_customers' => $this->Cliente->id,
																									'id_adresses' => $this->Endereco->id	
																									));
								$this->EnderecoCliente->save();
								$this->Endereco->create(false);
								$this->EnderecoCliente->create(false);
								echo "salvou";
							} 
						}
					} else {
						echo "não salvou!";
					}
				} 
						$this->set('error', true);
						$aux = (sizeof($this->data) - 1);
						for($i = 1; $i <= $aux; $i++){
							$enderecos_cadastrados[$i] = $this->data['Endereco'.$i];
							$this->set('enderecos_cadastrados', $enderecos_cadastrados);
						}
			}
		}
		
		public function gerencia(){
			
		}
}
?>