<div class="iconografias index">
	<h2><?php echo __('Iconografias'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($iconografias as $iconografia): ?>
	<tr>
		<td><?php echo h($iconografia['Iconografia']['id']); ?>&nbsp;</td>
		<td><?php echo h($iconografia['Iconografia']['nome']); ?>&nbsp;</td>
		<td><?php echo h($iconografia['Iconografia']['created']); ?>&nbsp;</td>
		<td><?php echo h($iconografia['Iconografia']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $iconografia['Iconografia']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $iconografia['Iconografia']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $iconografia['Iconografia']['id']), null, __('Tem certeza que deseja deletar # %s?', $iconografia['Iconografia']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>