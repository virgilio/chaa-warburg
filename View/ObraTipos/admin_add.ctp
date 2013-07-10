<div class="obraTipos form container">
  <?php echo $this->Form->create('ObraTipo', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <div class="row">
      <div class="span8">
	<legend><?php echo __('Adicionar técnica'); ?></legend>
      </div>
      <div class="span4">
	<?php echo $this->Html->link('Ver técnicas', array('controller' => 'obra_tipos','action' => 'index'), array('class' => 'btn_admin')); ?>
      </div>
    </div>
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
      <?php echo $this->Form->end(array('label' => 'Adicionar', 'class' => 'btn btn-success')); ?>
    </div>
  </div>
</div>
