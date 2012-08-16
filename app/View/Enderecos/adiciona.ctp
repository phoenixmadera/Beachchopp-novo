<?php echo $this->Html->script('system-functions/add-addresses'); ?>
<?php if(isset($success)): ?>
				<script type = "text/javascript">
					$(document).ready(function() {
					if($('.alert.alert-success').html() == null){
						$('.adicionaproduto').before('<div class = "alert alert-success">');
					}
					$('.alert.alert-success').html('<button class="close" data-dismiss="alert">×</button>');
					$('.alert.alert-success .close').after('<strong>Sucesso!</strong> O endereço foi corretamente cadastrado no sistema.');
					$('.alert.alert-success').fadeIn('slow');
					$('#EnderecoDes').val('');
					});
				</script>
<?php elseif(isset($error)): ?>
				<script type = "text/javascript">
					$(document).ready(function() {
					if($('.alert.alert-error').html() == null){
						$('.adicionaproduto').before('<div class = "alert alert-error">');
					}
					$('.alert.alert-error').html('<button class="close" data-dismiss="alert">×</button>');
					$('.alert.alert-error .close').after('<strong>Erro!</strong> Por favor, revise novamente os campos destacados em vermelho.');
					$('.alert.alert-error').fadeIn('slow');
					return false;
					});
				</script>
<?php endif; ?>
<div class = "adminwrap">
	<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Sucesso!</strong> O produto foi corretamente cadastrado no sistema.
  </div>
	<div class="alert alert-error">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <strong>Erro!</strong> Por favor, revise novamente os campos destacados em vermelho.
  </div>
  <div class = "gerenciaendereco">
	<div class = "topo">
		<div class = "topo-wrap">
			<p class = "titulo">
				Cadastro de Endereço
			</p>
			<div class = "botao-voltar">
				<?php echo $this->Html->link('voltar', array('controller' => 'users', 'action' => 'painel')); ?>
			</div>
		</div>
	</div>
	<div class = "conteudo">
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
																								'label' => 'Descrição'
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
                        'class' => 'enviar'
                  )); ?>
<?php echo $this->Form->end(); ?>
  </div>          
</div>
</div>