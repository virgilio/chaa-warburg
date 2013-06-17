<div class="obraTipos form">
<?php echo $this->Form->create('ObraTipo', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Editar tipo de Obra'); ?></legend>

		<?php echo $this->Form->input('id');?>
		<div class="control-group">
		  <label class="control-label" for="nome">Nome do tipo</label>
		  <div class="controls">
		    <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
		  </div>
		</div>

	</fieldset>
	<div class="control-group">
	  <label class="control-label" for="singlebutton"></label>
	  <div class="controls">
	    <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn')); ?>
	  </div>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ObraTipo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ObraTipo.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Obra Tipos'), array('action' => 'index')); ?></li>
	</ul>
</div>
