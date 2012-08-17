<?php echo $this->Html->script('system-functions/edit-addresses'); ?>
<?php if(isset($error)): ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Erro!</strong> <?php echo $this->Session->flash(); ?>
				</div>
				<script type = "text/javascript">
					$(document).ready(function() {	
						$('.alert-error').toggleAlert();
					});
				</script>
<?php endif; ?>
<?php if(isset($state)): ?>
				<script type = "text/javascript">
					$(document).ready(function () {
						var country_val = $('#EnderecoCountryValue').val();
						$('#EnderecoCountry').select(country_val);
					});
				</script>
<?php elseif(isset($city)): ?>
				<script type = "text/javascript">
					$(document).ready(function () {
						var state_val = $('#EnderecoStateValue').val();
						$('#EnderecoState').select(state_val);
					});
				</script>
<?php	endif; ?>
 <div class = "edit-address">
		<h2> Alteração de Endereço </h2>
		<div class = "back-btn">
			<?php echo $this->Html->link('voltar', array('controller' => 'enderecos', 'action' => 'gerencia')); ?>
		</div>
		<div class = "content">
<?php	echo $this->Form->create('Endereco', array('action' => 'edita/'.$this->params['pass'][0].'/'.$this->params['pass'][1])); ?>
<?php 
		switch($type): 
			case 'pais': 
				echo $this->Form->input(
																'type',
																	array(
																				'options' => array('P' => 'País'),
																				'type' => 'select',
																				'div' => array('class' => 'input select type'),
																				'label' => 'Tipo',
																				'disabled' => 'disabled'
																)); 
				echo $this->Form->input('des', array(
                        'type' => 'text',
												'value' => $country['Pais']['des'],
												'label' => 'Descrição',
												)); 									
			break;
			case 'estado':
				echo $this->Form->input(
																'type',
																	array(
																				'options' => array('E' => 'Estado'),
																				'type' => 'select',
																				'div' => array('class' => 'input select type'),
																				'label' => 'Tipo',
																				'disabled' => 'disabled'
																)); 
				echo $this->Form->input(
																'country',
																	array(
																				'options' => $countries,
																				'type' => 'select',
																				'label' => 'País'
																)); 
				echo $this->Form->input('des', array(
                        'type' => 'text',
												'value' => $state['Estado']['des'],
												'label' => 'Descrição',
												)); 
				echo $this->Form->input('country_value', array(
                        'type' => 'hidden',
												'value' => $country_id,
												'label' => false
												)); 	
			break;
			case 'cidade':
				echo $this->Form->input(
																'type',
																	array(
																				'options' => array('C' => 'Cidade'),
																				'type' => 'select',
																				'div' => array('class' => 'input select type'),
																				'label' => 'Tipo',
																				'disabled' => 'disabled'
																)); 
				echo $this->Form->input(
																'country',
																	array(
																				'options' => array('E' => $country['Pais']['des']),
																				'type' => 'select',
																				'label' => 'País',
																				'disabled' => 'disabled'
																)); 
				echo $this->Form->input(
																'state',
																	array(
																				'options' => $list_states,
																				'type' => 'select',
																				'label' => 'Estado',
																)); 
				echo $this->Form->input('des', array(
                        'type' => 'text',
												'value' => $city['Cidade']['des'],
												'label' => 'Descrição',
												)); 
				echo $this->Form->input('state_value', array(
                        'type' => 'hidden',
												'value' => $state_id,
												'label' => false
												)); 
			break;
		endswitch; ?>				
<?php 	echo $this->Form->input('Enviar', array(
                        'type' => 'submit',
												'label' => false,
                        'class' => 'btn primary'
                  )); ?>
<?php echo $this->Form->end(); ?>
  </div>          
</div>