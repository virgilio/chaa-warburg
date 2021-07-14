<?php echo $this->element('buscas'); ?>
<?php 
    $keys = array_keys($obras);
    $columns = array();
    $columns[0] = array_filter($keys, function($item){return $item % 4 == 0;});
    $columns[1] = array_filter($keys, function($item){return $item % 4 == 1;});
    $columns[2] = array_filter($keys, function($item){return $item % 4 == 2;});
    $columns[3] = array_filter($keys, function($item){return $item % 4 == 3;});
?>
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

<div id="image-wrapper">
    <?php foreach ($columns as $column): ?>
    <div class="obra-column">
    <?php foreach ($column as $item): ?>
    <?php $obra = $obras[$item]; ?>
        <div class="mini-obra">
    <?php 
      echo $this->Html->link($this->Html->image(
                      Configure::read('debug') >= 1 ? ('http://warburg.chaa-unicamp.com.br/img/obras/' . $obra['Obra']['imagem']) :
                      ('obras/mini/' . $obra['Obra']['imagem']), 
                           array('alt' => $obra['Obra']['imagem'], 
                                 'border' => '0')), 
        array('controller' => 'obras', 
              'action' => 'view', 
              $obra['Obra']['id']), 
        array('escape'=>false)); 
    ?>
            <p>
      <?php 
        echo $this->Html->link(
          h(substr($obra['Obra']['nome'], 0, 40)) . (strlen($obra['Obra']['nome']) > 40 ? '...' : ''), 
          array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), 
          array('escape'=>false)); 
      ?>
            </p>
            <p class="nome-artista">
      <?php 
        echo $this->Html->link(
          h(substr($obra['Artista']['nome'], 0, 40)) . (strlen($obra['Artista']['nome']) > 40 ? '...' : ''),
          array('controller' => 'artistas', 'action' => 'view',
                $obra['Artista']['id'])); 
      ?>
      (<?php 
        if (($obra['Obra']['ano_inicio'] == null) && ($obra['Obra']['ano_fim'] == null)) {
          echo 'sem data';
        } else {
          echo (h($obra['Obra']['ano_inicio']) != 0) ? h($obra['Obra']['ano_inicio']) . ' - ': ''; 
          echo h($obra['Obra']['ano_fim']); 
        };             
      ?>)
            </p>
            
        </div>
    <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>
 
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
