<?php $this->Html->css("admin.css", null, array("inline" => false)); ?>
<div class="obras index container">
  <div class="row">
    <div class="span8">
      <h2><?php echo __('Obras cadastradas'); ?></h2>
    </div>
    <div class="span4">
      <?php echo $this->Html->link('Cadastrar obra', array('controller' => 'obras','action' => 'insert'), array('class' => 'btn_admin')); ?>
    </div>
  </div>
  <div class="row">
    <div class="span6">
      <?php 
         echo $this->Form->create('Obra', array('type' => 'get', 'class' => 'form-horizontal')); ?>
      <fieldset>
        <!-- Text input-->
        <input type="hidden" name="Search[filter]" value="artista" /> 
        <?php
           echo $this->Form->input('Artista', array('type' => 'select', 'label' => '',
        'empty' => 'Filtrar por artista', 'onchange'=>'this.form.submit();',
        'class' => 'input_chosen'));
        ?>
      </fieldset>
      <?php echo $this->Form->end(); ?>
    </div>
    <div class="span6">
      <?php 
         echo $this->Form->create('Obra', array('type' => 'get', 'class' => 'form-horizontal')); ?>
      <fieldset>
        <!-- Text input-->
        <div class="controls">
          <input type="hidden" name="Search[filter]" value="obra" /> 
          <input id="busca" name="Search[query]" type="text"
                 placeholder="Buscar por nome da Obra"
                 class="input-large">
	  <?php echo $this->Form->end(array('label' => 'Buscar', 'id' => 'singlebutton',
	  'class' => 'btn btn-default')); ?>
        </div>        
      </fieldset>
      <?php echo $this->Form->end(); ?>			
    </div>
  </div>
  <table class="lista_admin" cellpadding="0" cellspacing="0">
    <tr>
      <th><?php echo $this->Paginator->sort('nome'); ?></th>
      <th><?php echo $this->Paginator->sort('artista_id'); ?></th>
      <th class="actions"><?php echo __('Ação'); ?></th>
    </tr>
    <?php foreach ($obras as $obra): ?>
    <tr>
      <td><?php echo h($obra['Obra']['nome']); ?>&nbsp;</td>
      <td>
	<?php echo $this->Html->link($obra['Artista']['nome'], array('controller' => 'artistas', 'action' => 'edit', $obra['Artista']['id'])); ?>
      </td>
      <td class="actions">
	<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $obra['Obra']['id'])); ?>
	<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $obra['Obra']['id']), null, __('Tem certeza que deseja deletar # %s?', $obra['Obra']['id'])); ?>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
  <p>
    <?php
       echo $this->Paginator->counter(array(
    'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
    ));
    ?>	</p>
  <div class="paging">
    <?php
       echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
      echo $this->Paginator->numbers(array('separator' => ''));
      echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
      ?>
  </div>
</div>


