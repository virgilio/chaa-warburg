<?php echo $this->Element('buscas'); ?>

<h1 class="title-home"><i class="icon-camera-retro"></i> Últimas obras cadastradas</h1>

<div class="row">
  <div class="span8 offset2 img-polaroid slide-container">
    <div id="slider-home" class="carousel slide">
      <ol class="carousel-indicators">
        <?php foreach($lastObras as $id => $obra):  ?>
            <li data-target="#slider-home" data-slide-to="<?php echo $id ?>" 
                class="<?php echo $id == 0 ? 'active ': ''; ?>"></li>
        <?php endforeach; ?>
      </ol>
      <!-- Carousel items -->
      <div class="carousel-inner">
        <?php foreach($lastObras as $id => $obra):  ?>
        <div class="<?php echo $id == 0 ? 'active ': ''; ?>item">
          <?php 
            echo $this->Html->link(
              $this->Html->image('obras/' . $obra['Obra']['imagem']) .
              '
              <div class="carousel-caption">
                <h4>'. $obra['Obra']['nome'] .'</h4>
              </div>
              ',
              array('controller' => 'obras', 
                    'action' => 'view', 
                    $obra['Obra']['id']), 
              array('escape'=>false));
            ?>
        </div>
        <?php endforeach; ?>
      </div>
      <!-- Carousel nav -->
      <a class="carousel-control left" href="#slider-home" data-slide="prev">&lsaquo;</a>
      <a class="carousel-control right" href="#slider-home" data-slide="next">&rsaquo;</a>
    </div>
  </div>
</div>
