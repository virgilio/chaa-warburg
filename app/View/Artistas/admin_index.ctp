<?php $this->Html->css("admin.css", null, array("inline" => false)); ?>
<div class="artistas index container">
  <div class="row">
    <div class="span8">
      <h2><?php echo __('Artistas'); ?></h2>
    </div>
    <div class="span4">
      <?php 
          echo $this->Html->link('Cadastrar artista', 
                                 array('controller' => 'artistas',
                                       'action' => 'add'), 
                                 array('class' => 'btn_admin')); 
      ?>
    </div>
  </div>
  <div class="row">
    <div class="span6">
      <?php 
        echo $this->Form->create('Artista', array('type' => 'get'));
      ?>
      <fieldset>
        <!-- Text input-->
        <div class="controls">
          <input type="hidden" 
                 name="Search[filter]" 
                 value="artista" />
          <input id="busca" 
                 name="Search[query]" 
                 type="text"
                 placeholder="Buscar por nome da Obra"
                 class="pull-left">
          <?php 
            echo $this->Form->end(array('label' => 'Buscar', 
                                        'id' => 'singlebutton',
                                        'class' => 'btn btn-default')
            ); 
          ?>
        </div>        
      </fieldset>
      <?php echo $this->Form->end(); ?>			
    </div>
  </div>
  <table class="lista_admin" cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('nome'); ?></th>
      <th class="actions"><?php echo __('Ação'); ?></th>
    </tr>
    <?php foreach ($artistas as $artista): ?>
    <tr>
      <td><?php echo h($artista['Artista']['nome']); ?>&nbsp;</td>
      <td class="actions">
        <?php 
          echo $this->Html->link(__('Editar'), 
                                 array('action' => 'edit', 
                                       $artista['Artista']['id'])
          ); 
        ?>
	<?php 
          echo $this->Form->postLink(__('Deletar'), 
                                     array('action' => 'delete', 
                                           $artista['Artista']['id']), 
                                     null, 
                                     __('Tem certeza que deseja deletar # %s?', 
                                        $artista['Artista']['id'])); 
        ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <div class="paging">
    <?php
            echo $this->Paginator->prev('< ' . __('anterior'), 
                                        array(), null, 
                                        array('class' => 'prev disabled')
            );
      echo $this->Paginator->numbers(array('separator' => ''));
      echo $this->Paginator->next(__('próxima') . ' >', 
                                  array(), null, 
                                  array('class' => 'next disabled')
      );
    ?>
  </div>
</div>
