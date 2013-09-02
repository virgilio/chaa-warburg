<div class="mini-obra img-polaroid"
     id="box-<?php echo $relacao_id; ?>">
  <div class="btns-mini-obra">
    <a href="#edit-relacao" data-toggle="modal" class="relacionada-link-edit"
       data-id="<?php echo $relacao_id; ?>"
       data-descricao="<?php echo $relacao_descricao; ?>"
       data-user-id="<?php echo $relacao_user_id; ?>"
       >
      <i class="icon-edit-sign"></i>
    </a>
    <?php 
       echo $this->Html->link('<i class="icon-remove"></i>', 
    array('controller' => 'obras_relacionadas', 
          'action' => 'delete', 
           $relacao_id), 
    array('parent' => 'box-' . $relacao_id,
          'relacionada' => $relacionada['Obra']['id'],     
          'escape' => false, 'class' => 'relacionada-link-delete')); ?>
  </div>
  <a class="fancybox" 
     href="#img_<?php echo $relacionada['Obra']['id'] ?>" 
     data-fancybox-group="gallery">
    <?php echo $this->Html->image('obras/thumbs/' . $relacionada['Obra']['imagem']); ?>
  </a>
  
  <div id="img_<?php echo $relacionada['Obra']['id'] ?>" style="display: none;" class="modal_relacionadas">
    <div class="obra">
      <p>
        <?php echo $this->Html->image(('obras/'. $obra['Obra']['imagem']),
        array('alt' => '', 'border' => '0')); ?>
      </p>
      <p>
        (<?php echo $obra['Obra']['ano_inicio'] . ' - '
               . $obra['Obra']['ano_fim']; ?>)
      </p>
      <p><?php echo $obra['Obra']['nome']; ?></p>
    </div>
    <div class="obra">
      <?php echo $this->Html->image('obras/'.$relacionada['Obra']['imagem']) ?>
      <p><?php echo $relacionada['Artista']['nome']; ?> (<?php echo h($relacionada['Obra']['ano_fim']); ?>)</p>
      <p>
        <?php echo $this->Html->link(
        h(substr($relacionada['Obra']['nome'], 0, 40)) . (strlen($relacionada['Obra']['nome']) > 40 ? '...' : ''), 
        array('controller' => 'obras', 'action' => 'view', $relacionada['Obra']['id'], 'admin' => false), 
        array('target' => '_blank', 'escape'=>false)); 
        ?>
      </p>
    </div>
  </div>
  
  <p>
    <?php echo $this->Html->link(
    h(substr($relacionada['Obra']['nome'], 0, 40)) . (strlen($relacionada['Obra']['nome']) > 40 ? '...' : ''), 
    array('controller' => 'obras', 'action' => 'view', $relacionada['Obra']['id'], 'admin' => false), 
    array('target' => '_blank','escape'=>false)); 
    ?>
  </p>
  <p class="nome-artista">
    <?php echo $this->Html->link($relacionada['Artista']['nome'],
    array('controller' => 'artistas', 'action' => 'view',
    $relacionada['Artista']['id'], 'admin' => false), array('target' => '_blank')); ?>
    (<?php echo h($relacionada['Obra']['ano_fim']); ?>)
  </p>
</div>
