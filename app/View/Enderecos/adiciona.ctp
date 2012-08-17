<?php echo $this->Html->script('system-functions/add-addresses'); ?>
<?php if(isset($success)): ?>
				<div class="alert alert-success">
			    <button type="button" class="close" data-dismiss="alert">×</button>
			    <strong>Sucesso!</strong> <?php echo $this->Session->flash(); ?>
			  </div>
				<script type = "text/javascript">
					$(document).ready(function() {	
						$('.alert-success').toggleAlert();
					});
				</script>
<?php elseif(isset($error)): ?>
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
<script type = "text/javascript">
	$(document).ready(function() {	
		//Chama a função acima quando a página carregar.
		$('#EnderecoType').control();
		
		//Chama a função acima quando mudar o select.
		$('#EnderecoType').change(function(){
			$(this).control();
 		});
 	});
</script>
  <div class = "add-address">
		<h2>Cadastro de Endereço</h2>
			<div class = "back-btn">
<?php 	echo $this->Html->link('voltar', array('controller' => 'users', 'action' => 'painel')); ?>
			</div>
	<div class = "content">
<?php	echo $this->Form->create('Endereco', array('action' => 'adiciona')); ?>
				<div class = "legenda">
					Selecione o tipo de localização que deseja cadastrar:
				</div>
				<div class = "tipo">
<?php 		echo $this->Form->input(
																'type',
																	array(
																				'options' => array('P' => 'País',
																													 'E' => 'Estado',
																													 'C' => 'Cidade'
																													 ),
																				'type' => 'select',
																				'div' => array('class' => 'input select type'),
																				'label' => false
																				)
																			); ?>
				</div>
<?php echo $this->Form->input('des', array(
																								'type' => 'text',
																								'label' => 'Descrição',
																								'value' => ''
															)); ?>
<?php echo $this->Form->input(
																	'countries',
																	array(
																				'options' => $countries,
																				'type' => 'select',
																				'label' => false,
																				'style' => 'display: none;',
																				'disabled' => 'disabled'
																				)
																			); ?>
<?php echo $this->Form->input(
																	'states',
																	array(
																				'options' => $states,
																				'type' => 'select',
																				'label' => false,
																				'style' => 'display: none;',
																				'disabled' => 'disabled',
																				'class' => 'input select real-state',
																				)
																			); ?>
<?php echo $this->Form->input(
																	'cities',
																	array(
																				'options' => $cities,
																				'type' => 'select',
																				'label' => false,
																				'style' => 'display: none;',
																				'disabled' => 'disabled'
																				)
																			); ?>
															
															
<?php 	echo $this->Form->input('Enviar', array(
                        'type' => 'submit',
												'label' => false,
                        'class' => 'btn primary'
                  )); ?>
<?php echo $this->Form->end(); ?>
</div>   
</div>       