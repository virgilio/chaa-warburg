<div class="obras index">
	<h2><?php echo __('Obras'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('imagem'); ?></th>
			<th><?php echo $this->Paginator->sort('ano_inicio'); ?></th>
			<th><?php echo $this->Paginator->sort('ano_fim'); ?></th>
			<th><?php echo $this->Paginator->sort('tamanho_obra'); ?></th>
			<th><?php echo $this->Paginator->sort('descricao'); ?></th>
			<th><?php echo $this->Paginator->sort('tags'); ?></th>
			<th><?php echo $this->Paginator->sort('obra_tipos_id'); ?></th>
			<th><?php echo $this->Paginator->sort('instituicao_id'); ?></th>
			<th><?php echo $this->Paginator->sort('pais_id'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
			<th><?php echo $this->Paginator->sort('artista_id'); ?></th>
			<th><?php echo $this->Paginator->sort('incerta'); ?></th>
			<th><?php echo $this->Paginator->sort('circa'); ?></th>
			<th><?php echo $this->Paginator->sort('aproximado'); ?></th>
			<th><?php echo $this->Paginator->sort('iconografia_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($obras as $obra): ?>
	<tr>
		<td><?php echo h($obra['Obra']['id']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['nome']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['imagem']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['ano_inicio']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['ano_fim']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['tamanho_obra']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['descricao']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['tags']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($obra['ObraTipo']['nome'], array('controller' => 'obra_tipos', 'action' => 'view', $obra['ObraTipo']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($obra['Instituicao']['nome'], array('controller' => 'instituicoes', 'action' => 'view', $obra['Instituicao']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($obra['Pais']['nome'], array('controller' => 'paises', 'action' => 'view', $obra['Pais']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($obra['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $obra['Cidade']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($obra['Artista']['nome'], array('controller' => 'artistas', 'action' => 'view', $obra['Artista']['id'])); ?>
		</td>
		<td><?php echo h($obra['Obra']['incerta']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['circa']); ?>&nbsp;</td>
		<td><?php echo h($obra['Obra']['aproximado']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($obra['Iconografia']['nome'], array('controller' => 'iconografias', 'action' => 'view', $obra['Iconografia']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $obra['Obra']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $obra['Obra']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $obra['Obra']['id']), null, __('Are you sure you want to delete # %s?', $obra['Obra']['id'])); ?>
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
