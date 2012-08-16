<?php if(isset($erro)): ?>
				<script type = "text/javascript">
					$(document).ready(function() {
						$('.alert').css('display', 'block');
					});
				</script>
<?php endif; ?>

<div class="alert alert-error">
  <button class="close" data-dismiss="alert">×</button>
  <strong>Erro!</strong> <?php echo $this->Session->flash(); ?>
</div>
<div class = "login-form">
	<div class = "well">
		   <h2>Login</h2>
<?php echo $this->Form->create('User',array('url' => array(	'controller' => 'users', 
																													 	'action' => 'login'), 
																						'class' => 'faleconosco'	)); ?>
		<fieldset>
      <div class="clearfix">
<?php 	echo $this->Form->input('username', array(
																								'type' => 'text',
																								'label' => false,
																								'placeholder' => 'Usuário'
																								)
															); ?> 
			</div> 
<?php echo $this->Form->input('password', array(
																								'type' => 'password',
																								'label' => false,
																								'placeholder' => 'Senha'
																								)
															); ?>
		<div class = "botaowrap">
<?php echo $this->Form->submit('Conectar-se', array('class' => 'btn primary')); ?>
		</div>
	</fieldset>
<?php echo $this->Form->end(); ?>
</div>
</div>