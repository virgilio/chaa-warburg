<div class="iconografias form">
<?php echo $this->Form->create('Iconografia'); ?>
	<fieldset>
		<legend><?php echo __('Edit Iconografia'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Iconografia.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Iconografia.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Iconografias'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
