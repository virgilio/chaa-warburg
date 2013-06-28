<div class="artistas index">
	<h2><?php echo __('Artistas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('imagem'); ?></th>
			<th><?php echo $this->Paginator->sort('biografia'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($artistas as $artista): ?>
	<tr>
		<td><?php echo h($artista['Artista']['id']); ?>&nbsp;</td>
		<td><?php echo h($artista['Artista']['nome']); ?>&nbsp;</td>
		<td><?php echo h($artista['Artista']['imagem']); ?>&nbsp;</td>
		<td><?php echo h($artista['Artista']['biografia']); ?>&nbsp;</td>
		<td><?php echo h($artista['Artista']['created']); ?>&nbsp;</td>
		<td><?php echo h($artista['Artista']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $artista['Artista']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $artista['Artista']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $artista['Artista']['id']), null, __('Tem certeza que deseja deletar # %s?', $artista['Artista']['id'])); ?>
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