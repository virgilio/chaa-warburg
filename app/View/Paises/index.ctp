<div class="paises index">
	<h2><?php echo __('Paises'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($paises as $pais): ?>
	<tr>
		<td><?php echo h($pais['Pais']['id']); ?>&nbsp;</td>
		<td><?php echo h($pais['Pais']['nome']); ?>&nbsp;</td>
		<td><?php echo h($pais['Pais']['created']); ?>&nbsp;</td>
		<td><?php echo h($pais['Pais']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pais['Pais']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pais['Pais']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $pais['Pais']['id']), null, __('Tem certeza que deseja deletar # %s?', $pais['Pais']['id'])); ?>
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
