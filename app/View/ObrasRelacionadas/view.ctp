<div class="obrasRelacionadas view">
<h2><?php  echo __('Obras Relacionada'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($obrasRelacionada['ObrasRelacionada']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obra'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obrasRelacionada['Obra']['nome'], array('controller' => 'obras', 'action' => 'view', $obrasRelacionada['Obra']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relacionada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obrasRelacionada['Relacionada']['nome'], array('controller' => 'obras', 'action' => 'view', $obrasRelacionada['Relacionada']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($obrasRelacionada['ObrasRelacionada']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($obrasRelacionada['ObrasRelacionada']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($obrasRelacionada['ObrasRelacionada']['descricao']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Obras Relacionada'), array('action' => 'edit', $obrasRelacionada['ObrasRelacionada']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Obras Relacionada'), array('action' => 'delete', $obrasRelacionada['ObrasRelacionada']['id']), null, __('Are you sure you want to delete # %s?', $obrasRelacionada['ObrasRelacionada']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras Relacionadas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obras Relacionada'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
