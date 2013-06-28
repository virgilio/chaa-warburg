<div class="obrasRelacionadas index">
	<h2><?php echo __('Obras Relacionadas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('obra_id'); ?></th>
			<th><?php echo $this->Paginator->sort('relacionada_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($obrasRelacionadas as $obrasRelacionada): ?>
	<tr>
		<td><?php echo h($obrasRelacionada['ObrasRelacionada']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($obrasRelacionada['Obra']['nome'], array('controller' => 'obras', 'action' => 'view', $obrasRelacionada['Obra']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($obrasRelacionada['Relacionada']['nome'], array('controller' => 'obras', 'action' => 'view', $obrasRelacionada['Relacionada']['id'])); ?>
		</td>
		<td><?php echo h($obrasRelacionada['ObrasRelacionada']['created']); ?>&nbsp;</td>
		<td><?php echo h($obrasRelacionada['ObrasRelacionada']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $obrasRelacionada['ObrasRelacionada']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $obrasRelacionada['ObrasRelacionada']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $obrasRelacionada['ObrasRelacionada']['id']), null, __('Tem certeza que deseja deletar # %s?', $obrasRelacionada['ObrasRelacionada']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
