<div class="obrasRelacionadas form">
<?php echo $this->Form->create('ObrasRelacionada'); ?>
	<fieldset>
		<legend><?php echo __('Add Obras Relacionada'); ?></legend>
	<?php
		echo $this->Form->input('obra_id');
		echo $this->Form->input('relacionada_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Obras Relacionadas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>