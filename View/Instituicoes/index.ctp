<div class="instituicoes index">
	<h2><?php echo __('Instituicoes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($instituicoes as $instituicao): ?>
	<tr>
		<td><?php echo h($instituicao['Instituicao']['id']); ?>&nbsp;</td>
		<td><?php echo h($instituicao['Instituicao']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($instituicao['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $instituicao['Cidade']['id'])); ?>
		</td>
		<td><?php echo h($instituicao['Instituicao']['created']); ?>&nbsp;</td>
		<td><?php echo h($instituicao['Instituicao']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $instituicao['Instituicao']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $instituicao['Instituicao']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $instituicao['Instituicao']['id']), null, __('Tem certeza que deseja deletar # %s?', $instituicao['Instituicao']['id'])); ?>
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
