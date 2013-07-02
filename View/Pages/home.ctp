<?php echo $this->Element('buscas'); ?>

<h1 class="title-home"><i class="icon-camera-retro"></i> Últimas obras cadastradas</h1>

<div class="row">
  <div class="span8 offset2 img-polaroid slide-container">
    <div id="slider-home" class="carousel slide">
      <ol class="carousel-indicators">
        <li data-target="#slider-home" data-slide-to="0" class="active"></li>
        <li data-target="#slider-home" data-slide-to="1"></li>
        <li data-target="#slider-home" data-slide-to="2"></li>
        <li data-target="#slider-home" data-slide-to="3"></li>
        <li data-target="#slider-home" data-slide-to="4"></li>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
        <div class="active item">
          <?php 
            echo $this->Html->link(
              $this->Html->image('obras/' . $lastObras[0]['Obra']['imagem']).
              '
              <div class="carousel-caption">
                <h4>'. $lastObras[0]['Obra']['nome'] .'</h4>
              </div>
              ',
              array('controller' => 'obras', 'action' => 'view', $lastObras[0]['Obra']['id']), 
              array('escape'=>false));
            ?>
        </div>
        <div class="item">
          <?php 
            echo $this->Html->link(
              $this->Html->image('obras/' . $lastObras[1]['Obra']['imagem']).
              '
              <div class="carousel-caption">
                <h4>'. $lastObras[1]['Obra']['nome'] .'</h4>
              </div>
              ',
              array('controller' => 'obras', 'action' => 'view', $lastObras[1]['Obra']['id']), 
              array('escape'=>false));
            ?>
        </div>
        <div class="item">
          <?php 
            echo $this->Html->link(
              $this->Html->image('obras/' . $lastObras[2]['Obra']['imagem']).
              '
              <div class="carousel-caption">
                <h4>'. $lastObras[2]['Obra']['nome'] .'</h4>
              </div>
              ',
              array('controller' => 'obras', 'action' => 'view', $lastObras[2]['Obra']['id']), 
              array('escape'=>false));
            ?>
        </div>
        <div class="item">
          <?php 
            echo $this->Html->link(
              $this->Html->image('obras/' . $lastObras[3]['Obra']['imagem']).
              '
              <div class="carousel-caption">
                <h4>'. $lastObras[3]['Obra']['nome'] .'</h4>
              </div>
              ',
              array('controller' => 'obras', 'action' => 'view', $lastObras[3]['Obra']['id']), 
              array('escape'=>false));
            ?>
        </div>
        <div class="item">
          <?php 
            echo $this->Html->link(
              $this->Html->image('obras/' . $lastObras[4]['Obra']['imagem']).
              '
              <div class="carousel-caption">
                <h4>'. $lastObras[4]['Obra']['nome'] .'</h4>
              </div>
              ',
              array('controller' => 'obras', 'action' => 'view', $lastObras[4]['Obra']['id']), 
              array('escape'=>false));
            ?>
        </div>
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#slider-home" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#slider-home" data-slide="next">&rsaquo;</a>
    </div>
  </div>
</div>

