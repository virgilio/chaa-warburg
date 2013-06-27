<div class="obrasRelacionadas form">
<?php echo $this->Form->create('ObrasRelacionada'); ?>
	<fieldset>
		<legend><?php echo __('Edit Obras Relacionada'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('obra_id');
		echo $this->Form->input('relacionada_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
