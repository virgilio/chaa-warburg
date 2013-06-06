<div class="artistas form">
<?php echo $this->Form->create('Artista'); ?>
	<fieldset>
		<legend><?php echo __('Edit Artista'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('imagem');
		echo $this->Form->input('biografia');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Artista.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Artista.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Artistas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
