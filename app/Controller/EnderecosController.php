<?php
class EnderecosController extends AppController {

    var $name = 'Enderecos';
		var $uses = array('Endereco', 'Pais', 'Estado', 'Cidade');
		
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
					$this->Endereco->set($this->data);
			if($this->Endereco->validates()){
				if(!empty($this->data)){
					$type = $this->data['Endereco']['type'];
					switch($type):
						case 'P':
							$this->request->data['Pais']['des'] = $this->data['Endereco']['des'];
							$this->Pais->save($this->data);
							$this->set('success', true);
							$this->Session->setFlash('O endereço foi cadastrado corretamente no sistema.');
						break;
						case 'E':
							$this->request->data['Estado']['des'] = $this->data['Endereco']['des'];
							$this->request->data['Estado']['id_countries'] = $this->data['Endereco']['countries'];
							$this->Estado->save($this->data);
							$this->set('success', true);
							$this->Session->setFlash('O endereço foi cadastrado corretamente no sistema.');
						break;
						case 'C':
							$this->request->data['Cidade']['des'] = $this->data['Endereco']['des'];
							if(!isset($this->data['Endereco']['states'])){
								$this->set('error', true);
								return false;
							}
							$this->request->data['Cidade']['id_states'] = $this->data['Endereco']['states'];
							$this->Cidade->save($this->data);
							$this->set('success', true);
							$this->Session->setFlash('O endereço foi cadastrado corretamente no sistema.');
						break;
					endswitch;
				}
			}  else {
						$this->set('error', true);
						$this->Session->setFlash('Por favor, revise novamente os campos destacados em vermelho.');
				}
		}
		
		public function gerencia(){
			//Pais
					$countries = $this->Pais->find('all');
					$this->set('countries', $countries);
				//Estados
					$states = $this->Estado->find('all');
					$this->set('states', $states);
				//Cidades
					$cities = $this->Cidade->find('all');
					$this->set('cities', $cities);
		}
		
		public function edita($type, $id){
			$this->Endereco->set($this->data);
			switch($type):
				case 'pais':
					$conditions = array('Pais.id' => $id);
					$country = $this->Pais->find('first', array('conditions' => $conditions,'fields' => 'Pais.des'));
					$this->set('country', $country);
					$this->set('type', $type);
					if($this->Endereco->validates()){
						if(!empty($this->data)){
							$this->request->data['Pais']['des'] = $this->data['Endereco']['des'];
							$this->Pais->id = $id;
							$this->Pais->read(null, $id);
							$this->Pais->save($this->data);
							$this->Session->setFlash('O endereço foi corretamente alterado.');
							$this->redirect('gerencia');
						}
					} else {
						$this->set('error', true);
						$this->Session->setFlash('Por favor, revise novamente os campos destacados em vermelho.');
					}
				break;
				case 'estado':
					$conditions = array('Estado.id' => $id);
					$state = $state = $this->Estado->find('first', array('conditions' => $conditions, 'fields' => array('Estado.id', 'Estado.des', 'Estado.id_countries')));
					$this->set('state', $state);
					$this->set('type', $type);
					$this->set('country_id', $state['Estado']['id_countries']);
					if($this->Endereco->validates()){
						if(!empty($this->data)){
							$this->request->data['Estado']['des'] = $this->data['Endereco']['des'];
							$this->request->data['Estado']['id_countries'] = $this->data['Endereco']['country'];
							$this->Estado->id = $id;
							$this->Estado->read(null, $id);
							$this->Estado->save($this->data);
							$this->Session->setFlash('O endereço foi corretamente alterado.');
							$this->redirect('gerencia');
						}
					} else {
							$this->set('error', true);
							$this->Session->setFlash('Por favor, revise novamente os campos destacados em vermelho.');
					}
				break;
				case 'cidade':
					$conditions = array('Cidade.id' => $id);
					$city = $this->Cidade->find('first', array('conditions' => $conditions));
					$conditions = array('Estado.id' => $city['Cidade']['id_states']);
					$state = $this->Estado->find('first', array('conditions' => $conditions, 'fields' => array('Estado.id', 'Estado.des', 'Estado.id_countries')));
					$conditions = array('Pais.id' => $state['Estado']['id_countries']);
					$country = $this->Pais->find('first', array('conditions' => $conditions));
					$conditions = array('Estado.id_countries' => $country['Pais']['id']);
					$list_states = $this->Estado->find('list', array('conditions' => $conditions, 'fields' => array('Estado.id', 'Estado.des', 'Estado.id_countries')));
					$this->set('city', $city);
					$this->set('country', $country);
					$this->set('list_states', $list_states);
					$this->set('type', $type);
					$this->set('state_id', $city['Cidade']['id_states']);
					if($this->Endereco->validates()){
						if(!empty($this->data)){
							$this->request->data['Cidade']['des'] = $this->data['Endereco']['des'];
							$this->request->data['Cidade']['id_states'] = $this->data['Endereco']['state'];
							$this->Cidade->id = $id;
							$this->Cidade->read(null, $id);
							$this->Cidade->save($this->data);
							$this->Session->setFlash('O endereço foi corretamente alterado.');
							$this->redirect('gerencia');
						}
					} else {
							$this->set('error', true);
							$this->Session->setFlash('Por favor, revise novamente os campos destacados em vermelho.');
					}
				break;
			endswitch;
			//População dos campos SELECT do formulário de endereço:
				$countries = $this->Pais->find('list', array('fields' => 'Pais.des'));
				$this->set('countries', $countries);
		}
		
		public function remove($type, $id){
			switch($type):
				case 'pais':
					$this->Pais->delete($id, true);
					$this->Session->setFlash('O endereço foi corretamente removido do sistema.');
				break;
				case 'estado':
					$this->Estado->delete($id, true);

					$this->Session->setFlash('O endereço foi corretamente removido do sistema.');
				break;
				case 'cidade':
					$this->Cidade->delete($id, true);
					$this->Session->setFlash('O endereço foi corretamente removido do sistema.');
				break;
			endswitch;
			$this->redirect('gerencia');
		}
}
?>