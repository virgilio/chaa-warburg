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
    Warburg - Banco Comparativo de Imagens:
    <?php echo $title_for_layout; ?>
  </title>
  <link href='http://fonts.googleapis.com/css?family=Average' rel='stylesheet' type='text/css'>
  <?php
    echo $this->Html->meta('icon');
    
    echo $this->Html->css("jquery-ui.css");
    
    echo $this->Html->css('bootstrap.min');
    echo $this->Html->css('jquery.fancybox');
    echo $this->Html->css('chosen');
    echo $this->Html->css('font-awesome/css/font-awesome.min.css');
    echo $this->Html->css('swinxyzoom/jquery.swinxy-combined.css');
    echo $this->Html->css('default');
    
    echo $this->Html->script('jquery-1.10.1.min.js');
    echo $this->Html->script("jquery-ui.js"); 
    echo $this->Html->script('bootstrap.min');
    echo $this->Html->script('chosen.jquery.min');
    echo $this->Html->script('fancyBox/source/jquery.fancybox.js?v=2.1.5');
    echo $this->Html->script('swinxyzoom/jquery.swinxy-combined.min.js');
    echo $this->Html->script('callswinxy.js');
    echo $this->Html->script('default');
    
    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    
  ?>
</head>
<body>
  <div id="container">
    <div id="header">
      
      <?php 
        echo $this->Html->link(
          $this->Html->image('cabecalhos/cabecalho-' . rand(1, 40) . '.jpg', array('alt' => $cakeDescription, 'border' => '0')),
          array('controller' => '', 'action' => '/'),
          array('class' => 'lnk_logo', 'escape' => false)
        );
      ?>
      <nav id="main-menu">
	<ul>
	  <li><?php echo $this->Html->link(__('Administração'), array('controller' => 'users', 'action' => 'login')); ?></li>
	  <li><?php echo $this->Html->link(__('Página inicial do CHAA'), 'http://www.unicamp.br/chaa/'); ?></li>
	  <li><?php echo $this->Html->link(__('Lista de Obras'), array('controller' => 'obras', 'action' => 'index')); ?></li>
	  <li><?php echo $this->Html->link('Sobre a busca',
                                           array('controller' => 'pages', 'action' => 'sobre-busca'),
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
    <div id="rodape">
      © 1994-<?php echo date('Y'); ?> CHAA – Centro de História da Arte e Arqueologia |  
      <a href="mailto:martinho@chaa-unicamp.com.br">CONTATO</a> | <?php echo $this->Html->link('SOBRE O SITE',
                                                                                               array('controller' => 'pages', 'action' => 'sobre-site'),
                                                                                               array('escape' => false)
        );
      ?>
    </div>
  </div>
</body>
</html>
