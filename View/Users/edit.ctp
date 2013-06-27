<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Edit User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nome');
		echo $this->Form->input('email');
		echo $this->Form->input('password');
		echo $this->Form->input('role');
		echo $this->Form->input('last_login');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
