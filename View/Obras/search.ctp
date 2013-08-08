<?php echo $this->element('buscas'); ?>
<div class="obras index">
    <h1><?php echo __('Lista de obras'); ?></h1>
  <div class="span12 clearfix">
    <p style="float: left;">Ordenar por: </p>
    <ul class="unstyled inline clearfix">
      <li><?php echo $this->Paginator->sort('Obra.nome', 'Nome da Obra'); ?> | </li>
      <li><?php echo $this->Paginator->sort('Artista.nome', 'Autor'); ?> | </li>
      <li><?php echo $this->Paginator->sort('Obra.ano_fim', 'Ano de conclusão'); ?></li>
    </ul>
  </div>

    <?php foreach ($obras as $obra): ?>
        <div class="mini-obra">
            <?php 
               echo $this->Html->link(
                      $this->Html->image(('obras/thumbs/' . $obra['Obra']['imagem']), 
                        array('alt' => $obra['Obra']['imagem'], 'border' => '0')), 
                        array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), 
                        array('escape'=>false)); 
/*echo $this->Html->link($this->Html->image(('obras/'.$obra['Obra']['id'].'_thumb.jpg'), array('alt' => 'oie', 'border' => '0')), array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), array('escape'=>false));*/ ?>
            <p>
                <?php echo $this->Html->link(
                    h(substr($obra['Obra']['nome'], 0, 40)) . (strlen($obra['Obra']['nome']) > 40 ? '...' : ''), 
                    array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), 
                    array('escape'=>false)); 
                ?>
            </p>
            <p class="nome-artista">
                <?php echo $this->Html->link(
                    h(substr($obra['Artista']['nome'], 0, 40)) . (strlen($obra['Artista']['nome']) > 40 ? '...' : ''),
                array('controller' => 'artistas', 'action' => 'view',
                $obra['Artista']['id'])); ?>
                (<?php 
                    if(!empty($obra['Obra']['ano_inicio'])) {
                      echo $obra['Obra']['ano_inicio'] ?>
                - 
                      <?php } ?><?php echo h($obra['Obra']['ano_fim']); ?>)
            </p>
            
        </div>
    <?php endforeach; ?>
    
    <div class="paging">
        <p>
            <?php
            echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}, mostrando {:current} obras de {:count}')
            ));
            ?>  
        </p>
        <p>
          <?php
            echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
            echo $this->Paginator->numbers(array('separator' => ''));
            echo $this->Paginator->next(__('Próxima') . ' >', array(), null, array('class' => 'next disabled'));
          ?>
        </p>
    </div>
</div>
