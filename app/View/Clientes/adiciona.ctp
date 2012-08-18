<?php echo $this->Html->script('system-functions/add-customers.js'); ?>
<?php //echo $this->Html->script('system-functions/add-customers_old.js'); ?>
<script type = "text/javascript">
	$(document).ready(function() {

		var state_value_default = $('#ClienteState').html();
		var city_value_default = $('#ClienteCity').html();
		var cpf_value = $('.elements .input.required #ClienteCpf').val();
		var cnpj_value = $('.elements .input.required #ClienteCnpj').val();

		//Popula os selects ao carregar a página
		$('#ClienteCountry').populaSelects('#ClienteState', state_value_default);
		$('#ClienteState').populaSelects('#ClienteCity', city_value_default);
		
		//Toda vez que mudar o select país
		$('#ClienteCountry').change(function(){
			$(this).populaSelects('#ClienteState', state_value_default);
			$('#ClienteState').populaSelects('#ClienteCity', city_value_default);
 		});

		//Toda vez que mudar o select estado
 		$('#ClienteState').change(function(){
			$(this).populaSelects('#ClienteCity', city_value_default);
 		});

 		//Faz o controle do tipo de cliente toda vez que carrega a página.
		$('#ClienteFlgType').controlCustomerType();

 		//Faz o controle do tipo de cliente toda vez que muda o select.
		$('#ClienteFlgType').change(function(){
			$('#ClienteFlgType').controlCustomerType();
		});

 	});
</script>
<div class="alert alert-error">
	<button class="close" data-dismiss="alert">×</button>
</div>
<div class = "add-customers">
<?php echo $this->Form->create('Cliente', array('action' => 'adiciona')); ?>
	<div class = "personal-info">
		<h2>Dados pessoais/comerciais</h2>
<?php echo $this->Form->input('name', array('type' => 'text',
																						'label' => 'Nome Completo',
																						'class' => 'campo'
															)); ?>
<?php echo $this->Form->input('flg_type',array('options' => array('F' => 'Fisica', 'J' => 'Jurídica'),
																								 'type' => 'select',
																								 'label' => 'Tipo',
																								 'class' => 'select'
															));	?>
	<div class = "elements">
<?php echo $this->Form->input('cpf', array('type' => 'text',
																										 'label' => false,
																										 'class' => 'campo',
																										 'style' => 'display: none;',
																										 'disabled' => 'disabled'
															)); ?>
<?php echo $this->Form->input('cnpj', array('type' => 'text',
																											'label' => false,
																											'class' => 'hidden-cnpj',
																											'style' => 'display: none;',
																											'disabled' => 'disabled',
																											'div' => array('class' => 'input text hidden-cnpj')
															)); ?>
<?php echo $this->Form->input('responsible', array('options' => $customers,
																									 'type' => 'select',
																									 'label' => false,
																									 'class' => 'tipo',
																									 'style' => 'display: none;',
																									 'div' => array('class' => 'input select hidden-responsible')	
															));	?>
	</div>
<?php echo $this->Form->input('phone', array('type' => 'text',
																						 'label' => 'Telefone',
																						 'class' => 'campo'
															)); ?>
<?php echo $this->Form->input('mobile', array('type' => 'text',
																							'label' => 'Celular',
																							'class' => 'campo'
															)); ?>
	</div>
	<div class = "address">
		<h2>Endereço</h2>
<?php echo $this->Form->input('country', array('options' => $countries,
																							 'type' => 'select',
																							 'label' => 'País',
																							 'class' => 'tipo'			
															));	?>
<?php echo $this->Form->input('state', array('options' => $states,
																							 'type' => 'select',
																							 'label' => 'Estado',
																							 'class' => 'states'
																)); ?>
<?php echo $this->Form->input('city', array('options' => $cities,
																						'type' => 'select',
																						'label' => 'Cidade',
																						'class' => 'tipo'
															)); ?>
<?php echo $this->Form->input('type_addresses', array('options' => $type_adresses,
																											'type' => 'select',
																											'label' => 'Tipo',
																											'class' => 'tipo'
															)); ?>
<?php echo $this->Form->input('des', array('type' => 'text',
																					 'label' => 'Logradouro',
																					 'class' => 'campo_pequeno'
															)); ?>
<?php echo $this->Form->input('number', array('type' => 'text',
																							'label' => 'Número',
																							'class' => 'campo_pequeno'
															)); ?>
<?php echo $this->Form->input('complement', array('type' => 'text',
																									'label' => 'Complemento',
																									'class' => 'campo_pequeno'
															)); ?>
<?php echo $this->Form->input('cep', array('type' => 'text',
																					 'label' => 'CEP',
																					 'class' => 'campo_pequeno'
															)); ?>
			<div class = "botao_adicionar" id = "client_add_adress"> + </div>
	</div>
	<div class = "new-addresses">
		<h2>Endereços Cadastrados</h2>
		<div class = "registereds-addresses" id = "enderecos-cadastrados">
			<?php
			if(isset($error)){
				if(isset($enderecos_cadastrados)){
					debug($enderecos_cadastrados); 
				}
			}?>
		</div>
	</div>
<?php echo $this->Form->input('Enviar', array(
			                        'type' => 'submit',
															'label' => false,
			                        'class' => 'btn primary'
                  						)); ?>
<?php echo $this->Form->end(); ?>  
 </div>  