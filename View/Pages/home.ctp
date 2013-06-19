<?php echo $this->Element('buscas'); ?>

<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <?php 
     //pr($lastObras);
     ?>
  <div class="carousel-inner">
    <div class="active item"><?php echo $this->Html->image('obras/' . $lastObras[0]['Obra']['imagem']);?></div>
    <div class="item"><?php echo $this->Html->image('obras/' . $lastObras[1]['Obra']['imagem']);?></div>
    <div class="item"><?php echo $this->Html->image('obras/' . $lastObras[2]['Obra']['imagem']);?></div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
