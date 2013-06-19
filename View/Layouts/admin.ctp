<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('jquery.fancybox');
		echo $this->Html->css('chosen');
		echo $this->Html->css('default');
		echo $this->Html->css('admin');

		echo $this->Html->script('jquery-1.10.1.min.js');
		echo $this->Html->script('bootstrap.min');
		echo $this->Html->script('chosen.jquery.min');
		echo $this->Html->script('fancyBox/source/jquery.fancybox.js?v=2.1.5');
		echo $this->Html->script('default');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="admin-container">
		<div id="header">
			<div class="navbar navbar-fixed-top">
			  <div class="navbar-inner">
			    <div class="container">
			          <div class="nav-collapse collapse">
			            <ul id="menu-topo" class="nav">
			              <li class="<?php echo (strpos($this->here, 'obras') !== false) ? 'active' : ''; ?>">
			                <?php echo $this->Html->link(__('Obras'), array('controller' => 'obras', 'action' => 'admin_index')); ?>
			              </li>
			              <li class="<?php echo (strpos($this->here, 'artistas') !== false) ? 'active' : ''; ?>">
			                <?php echo $this->Html->link(__('Artistas'), array('controller' => 'artistas', 'action' => 'admin_index')); ?>
			              </li>
			              <li class="<?php echo (strpos($this->here, 'instituicoes') !== false) ? 'active' : ''; ?>" >
			                <?php echo $this->Html->link(__('Instituições'), array('controller' => 'instituicoes', 'action' => 'admin_index')); ?>
			              </li>
			              <li class="<?php echo (strpos($this->here, 'cidades') !== false) ? 'active' : ''; ?>">
			                <?php echo $this->Html->link(__('Cidades'), array('controller' => 'cidades', 'action' => 'admin_index')); ?>
			              </li>
			              <li class="<?php echo (strpos($this->here, 'paises') !== false) ? 'active' : ''; ?>">
			                <?php echo $this->Html->link(__('Países'), array('controller' => 'paises', 'action' => 'admin_index')); ?>
			              </li>
			              <li class="<?php echo (strpos($this->here, 'iconografias') !== false) ? 'active' : ''; ?>">
			                <?php echo $this->Html->link(__('Iconografias'), array('controller' => 'iconografias', 'action' => 'admin_index')); ?>
			              </li>
			              <li class="<?php echo (strpos($this->here, 'obra_tipos') !== false) ? 'active' : ''; ?>">
			                <?php echo $this->Html->link(__('Tipos de obra'), array('controller' => 'obra_tipos', 'action' => 'admin_index')); ?>
			              </li>
			            </ul>
			          </div>
			        </div>
			  </div>
			</div>


			<?php echo $this->Html->link(
					$this->Html->image('cabecalhos/cabecalho-' . rand(1, 40) . '.jpg', array('alt' => $cakeDescription, 'border' => '0')),
					array('controller' => '', 'admin' => false, 'action' => '/'),
					array('class' => 'lnk_logo', 'escape' => false)
				);
			?>
			<nav id="main-menu">
				<ul>
					<li><?php echo $this->Html->link('Administração',
					'#',
					array('escape' => false)
						);
					?></li>
					<li><?php echo $this->Html->link(__('Lista de Obras'), array('controller' => 'obras', 'admin' => false, 'action' => 'index')); ?></li>
					<li><?php echo $this->Html->link('Sobre a busca',
					'#',
					array('escape' => false)
						);
					?></li>
				</ul>
			</nav>
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>