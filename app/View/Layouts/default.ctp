
<?php $cakeDescription = 'Beach Chopp - Sistema de Administração interna'; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
	</title>
	<link rel="stylesheet/less" type="text/css" href="/Beachchopp-novo/app/webroot/less/bootstrap.less">

	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
		echo $this->Html->script('jquery-1.8.0.min.js');
		echo $this->Html->script('less-1.3.0.min.js');
		echo $this->Html->script('bootstrap/bootstrap-button.js');
		echo $this->Html->script('bootstrap/bootstrap-dropdown.js');
	?>
</head>
<body>
  <div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Beach Chopp</a>
          <?php if ($this->Session->read('Auth.User'))
           				echo $this->element('top-menu'); ?>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
<?php 	echo $content_for_layout; ?>
      </div>
      <hr>
      <footer>
        <p>&copy; Company 2012</p>
      </footer>
    </div><!--/.fluid-container-->

<?php echo $this->element('sql_dump'); ?>
</body>
</html>
