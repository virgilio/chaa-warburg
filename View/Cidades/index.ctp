<div class="cidades index">
	<h2><?php echo __('Cidades'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('pais_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($cidades as $cidade): ?>
	<tr>
		<td><?php echo h($cidade['Cidade']['id']); ?>&nbsp;</td>
		<td><?php echo h($cidade['Cidade']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cidade['Pais']['nome'], array('controller' => 'paises', 'action' => 'view', $cidade['Pais']['id'])); ?>
		</td>
		<td><?php echo h($cidade['Cidade']['created']); ?>&nbsp;</td>
		<td><?php echo h($cidade['Cidade']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $cidade['Cidade']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cidade['Cidade']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $cidade['Cidade']['id']), null, __('Tem certeza que deseja deletar # %s?', $cidade['Cidade']['id'])); ?>
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
