<?php 
	$this->Html->css("admin.css", null, array("inline" => false));
?>

<div class="obras index">
	<h2><?php echo __('Obras cadastradas'); ?></h2>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Obra'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Obra Tipos'), array('controller' => 'obra_tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra Tipo'), array('controller' => 'obra_tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instituicoes'), array('controller' => 'instituicoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instituicao'), array('controller' => 'instituicoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artistas'), array('controller' => 'artistas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artista'), array('controller' => 'artistas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Iconografias'), array('controller' => 'iconografias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iconografia'), array('controller' => 'iconografias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Relacionada'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
