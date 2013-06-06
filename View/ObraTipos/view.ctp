<div class="obraTipos view">
<h2><?php  echo __('Obra Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Obra Tipo'), array('action' => 'edit', $obraTipo['ObraTipo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Obra Tipo'), array('action' => 'delete', $obraTipo['ObraTipo']['id']), null, __('Are you sure you want to delete # %s?', $obraTipo['ObraTipo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Obra Tipos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra Tipo'), array('action' => 'add')); ?> </li>
	</ul>
</div>
