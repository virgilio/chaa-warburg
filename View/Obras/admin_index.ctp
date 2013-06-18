<?php 
	$this->Html->css("admin.css", null, array("inline" => false));
?>

<div class="obras index container">
	<div class="row">
		<div class="span8">
			<h2><?php echo __('Obras cadastradas'); ?></h2>
		</div>
		<div class="span4">
			<?php echo $this->Html->link('Cadastrar obra', array('controller' => 'obras','action' => 'insert'), array('class' => 'btn_admin')); ?>
		</div>
	</div>
	<table class="lista_admin" cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('nome'); ?></th>
		<th><?php echo $this->Paginator->sort('artista_id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($obras as $obra): ?>
	<tr>
		<td><?php echo h($obra['Obra']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($obra['Artista']['nome'], array('controller' => 'artistas', 'action' => 'edit', $obra['Artista']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $obra['Obra']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $obra['Obra']['id']), null, __('Are you sure you want to delete # %s?', $obra['Obra']['id'])); ?>
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
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>