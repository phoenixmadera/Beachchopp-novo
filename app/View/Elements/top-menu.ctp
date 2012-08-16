<div class="btn-group pull-right">
  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
    <i class="icon-user"></i> Opções
    <span class="caret"></span>
  </a>
  <ul class="dropdown-menu">
    <li><a href="#">Usuários do Sistema</a></li>
    <li class="divider"></li>
    <li>
<?php echo $this->Html->link('Sair', array('controller' => 'users', 'action' => 'logout')); ?>
    </li>
  </ul>
</div>
<div class="nav-collapse">
  <ul class="nav nav-pills">
  <li class="active">
<?php echo $this->Html->link('Principal', array('controller' => 'users', 'action' => 'painel')); ?> 
  </li>
  <li class="dropdown" id="menu1">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
      Produtos
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li>
<?php   echo $this->Html->link('Cadastro', array('controller' => 'produtos', 'action' => 'adiciona')); ?>     
      </li>
      <li>
<?php   echo $this->Html->link('Gerenciamento de Produtos', array('controller' => 'produtos', 'action' => 'gerencia')); ?>        
      </li>
      <li class="divider"></li>
      <li>
<?php   echo $this->Html->link('Controle de Estoque', array('controller' => 'estoques', 'action' => 'gerencia')); ?>
      </li>
    </ul>
  </li>
  <li class="dropdown" id="menu2">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu2">
      Pedidos
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li>
<?php   echo $this->Html->link('Cadastro', array('controller' => 'users', 'action' => 'admin_listausuarios')); ?>
      </li>
      <li>
<?php   echo $this->Html->link('Pedidos Pendentes', array('controller' => 'users', 'action' => 'admin_listausuarios')); ?>        
      </li>
      <li>
<?php   echo $this->Html->link('Histórico', array('controller' => 'users', 'action' => 'admin_listausuarios')); ?>
      </li>
    </ul>
  </li>
  <li class="dropdown" id="menu3">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu3">
      Clientes
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li>
<?php   echo $this->Html->link('Cadastro', array('controller' => 'clientes', 'action' => 'adiciona')); ?>
      </li>
      <li>
<?php   echo $this->Html->link('Gerenciamento de Clientes', array('controller' => 'clientes', 'action' => 'gerencia')); ?>      
      </li>
    </ul>
  </li>
  <li class="dropdown" id="menu4">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu4">
      Endereços
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li>
<?php   echo $this->Html->link('Cadastro', array('controller' => 'enderecos', 'action' => 'adiciona')); ?>
      </li>
      <li>
<?php   echo $this->Html->link('Gerenciamento de Endereços', array('controller' => 'enderecos', 'action' => 'gerencia')); ?>    
      </li>
    </ul>
  </li>
  <li class="dropdown" id="menu5">
    <a class="dropdown-toggle" data-toggle="dropdown" href="#menu5">
      Administrativo
      <b class="caret"></b>
    </a>
    <ul class="dropdown-menu">
      <li>
<?php   echo $this->Html->link('Relatórios', array('controller' => 'users', 'action' => 'admin_listausuarios')); ?>
      </li>
      <li class="divider"></li>
      <li>
<?php   echo $this->Html->link('Cadastro de Funcionários', array('controller' => 'users', 'action' => 'admin_listausuarios')); ?>   
      </li>
      <li>
<?php   echo $this->Html->link('Gerenciamento de Funcionários', array('controller' => 'users', 'action' => 'admin_listausuarios')); ?>    
      </li>
    </ul>
  </li>
</ul>
</div><!--/.nav-collapse -->