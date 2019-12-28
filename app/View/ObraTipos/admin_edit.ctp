<div class="obraTipos form container">
  <div class="row">
    <div class="span7">
      <h2><?php echo __('Editar técnica'); ?></h2>
    </div>
    <div class="span5">
      <?php echo $this->Html->link('Ver técnicas', array('controller' => 'obra_tipos','action' => 'index'), array('class' => 'btn_admin')); ?>
      <?php echo $this->Form->postLink(__('Deletar técnica'), array('action' => 'delete', $this->request->data['ObraTipo']['id']), 
      array('class' => 'btn_admin'), __('Tem certeza que deseja deletar # %s?', $this->request->data['ObraTipo']['id'])); ?>
    </div>
  </div>
  <?php echo $this->Form->create('ObraTipo', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <?php echo $this->Form->input('id');?>
    <div class="control-group">
      <label class="control-label" for="nome">Nome da técnica</label>
      <div class="controls">
	<?php echo $this->Form->input('nome', array('label' => '')); ?>		    
      </div>
    </div>

  </fieldset>
  <div class="control-group">
    <label class="control-label" for="singlebutton"></label>
    <div class="controls">
      <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>
    </div>
  </div>
</div>
