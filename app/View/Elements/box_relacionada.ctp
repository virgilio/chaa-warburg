<div class="mini-obra img-polaroid" 
     id="box-<?php echo $relacionada['ObrasRelacionada']['id']; ?>">
  <div class="btns-mini-obra">
    <a href="#edit-relacao" data-toggle="modal" class="relacionada-link-edit"
       data-id="<?php echo $relacionada['ObrasRelacionada']['id']; ?>"
       data-descricao="<?php echo
         $relacionada['ObrasRelacionada']['descricao']; ?>"
       data-user-id="<?php echo
         $relacionada['ObrasRelacionada']['user_id']; ?>"
       >
       <i class="icon-edit-sign"></i>
    </a>
    <?php 
       echo $this->Html->link('<i class="icon-remove"></i>', 
    array('controller' => 'obras_relacionadas', 
          'action' => 'delete', 
          $relacionada['ObrasRelacionada']['id']), 
    array('parent' => 'box-' . $relacionada['ObrasRelacionada']['id'],
          'relacionada' => $relacionada['id'],
          'escape' => false, 'class' => 'relacionada-link-delete')); ?>
  </div>
  <a class="fancybox" 
     href="#img_<?php echo $relacionada['id'] ?>" 
     data-fancybox-group="gallery">
    <?php echo $this->Html->image('obras/mini/' . $relacionada['imagem']); ?>
  </a>
  
  <div id="img_<?php echo $relacionada['id'] ?>" style="display: none;" class="modal_relacionadas">
    <div class="obra">
      <p>
        <?php echo $this->Html->image(('obras/'. $obra['imagem']),
        array('alt' => '', 'border' => '0')); ?>
      </p>
      <p>
        (<?php echo $obra['ano_inicio'] . ' - '
               . $obra['ano_fim']; ?>)
      </p>
      <p><?php echo $obra['nome']; ?></p>
    </div>
    <div class="obra">
      <?php echo $this->Html->image('obras/'.$relacionada['imagem']) ?>
      <p><?php echo $relacionada['Artista']['nome']; ?> (<?php echo h($relacionada['ano_fim']); ?>)</p>
      <p>
        <?php echo $this->Html->link(
        h(substr($relacionada['nome'], 0, 40)) . (strlen($relacionada['nome']) > 40 ? '...' : ''), 
        array('controller' => 'obras', 'action' => 'view', $relacionada['id'], 'admin' => false), 
        array('target' => '_blank', 'escape'=>false)); 
        ?>
      </p>
    </div>
  </div>
  
  <p>
    <?php echo $this->Html->link(
    h(substr($relacionada['nome'], 0, 40)) . (strlen($relacionada['nome']) > 40 ? '...' : ''), 
    array('controller' => 'obras', 'action' => 'view', $relacionada['id'], 'admin' => false), 
    array('target' => '_blank','escape'=>false)); 
    ?>
  </p>
  <p class="nome-artista">
    <?php echo $this->Html->link($relacionada['Artista']['nome'],
    array('controller' => 'artistas', 'action' => 'view',
    $relacionada['Artista']['id'], 'admin' => false), array('target' => '_blank')); ?>
    (<?php echo h($relacionada['ano_fim']); ?>)
  </p>
</div>
