<div class = "flash msg">
  <?php echo $this->Session->flash(); ?>
</div>
<div class = "manage-address">
	<h2>Gerenciamento de Endereços</h2>
	<div class = "back-btn">
<?php echo $this->Html->link('voltar', array('controller' => 'users', 'action' => 'painel')); ?>
	</div>
    <div class = "content">
      <table class = "table table-condensed" style = "text-align: center;">
   			<tbody>
<?php 		foreach($countries as $country): ?>
						<tr style = "background-color: #f0eded;">
							<td class = "country">
<?php 					echo $country['Pais']['des']; ?>
							</td>
							<td>
								<div class="btn-group">
									<button class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
										Opções
										<span class="caret"></span>
									</button>
									<ul class="dropdown-menu">
	<?php 						echo $this->Html->link('Alterar', array('controller' => 'enderecos', 'action' => 'edita', 'pais', $country['Pais']['id'])); ?>
	<?php 						echo $this->Html->link('Excluir', array('controller' => 'enderecos', 'action' => 'remove', 'pais', $country['Pais']['id']), array(),
																					 "Excluindo este item você estára excluindo tudo relacionado a ele. Deseja continuar?"); ?>
									</ul>
								</div>
							</td>
						</tr>
<?php 			foreach($states as $state): ?>
<?php 				if($state['Estado']['id_countries'] == $country['Pais']['id']){ ?>
								<tr style = "background-color: #f2f1f1;">
									<td class = "state">
<?php 							echo $this->Html->image('table-indent.png')."  ".$state['Estado']['des']; ?>
									</td>
									<td>
									<div class="btn-group">
										<button class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
											Opções
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu">
<?php 								echo $this->Html->link('Alterar', array('controller' => 'enderecos', 'action' => 'edita', 'estado', $state['Estado']['id'])); ?>
<?php 								echo $this->Html->link('Excluir', array('controller' => 'enderecos', 'action' => 'remove', 'estado', $state['Estado']['id']), array(),
																						 "Excluindo este item você estára excluindo tudo relacionado a ele. Deseja continuar?"); ?>
										</ul>
									</div>
								</td>
							</tr>
<?php						foreach($cities as $city): ?>
<?php 					if($city['Cidade']['id_states'] == $state['Estado']['id']){ ?>
									<tr style = "background-color: #f7f4f4;">
										<td class = "city">
<?php 								echo $this->Html->image('table-indent.png')."  ".$city['Cidade']['des']; ?>
										</td>
										<td>
										<div class="btn-group">
											<button class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
												Opções
												<span class="caret"></span>
											</button>
											<ul class="dropdown-menu">
<?php 									echo $this->Html->link('Alterar', array('controller' => 'enderecos', 'action' => 'edita', 'cidade', $city['Cidade']['id'])); ?>
<?php 									echo $this->Html->link('Excluir', array('controller' => 'enderecos', 'action' => 'remove', 'cidade', $city['Cidade']['id']), array(),
																							 "Excluindo este item você estára excluindo tudo relacionado a ele. Deseja continuar?"); ?>
											</ul>
									</div>
								</td>
							</tr>
<?php						} ?>
<?php						endforeach; ?>
<?php         } ?>
<?php 			endforeach; ?>
<?php 		endforeach; ?>
				</tbody>
      </table>
    </div>  
  </div>