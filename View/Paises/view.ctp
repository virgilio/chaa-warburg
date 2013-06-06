<div class="paises view">
<h2><?php  echo __('Pais'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($pais['Pais']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($pais['Pais']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($pais['Pais']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($pais['Pais']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Pais'), array('action' => 'edit', $pais['Pais']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Pais'), array('action' => 'delete', $pais['Pais']['id']), null, __('Are you sure you want to delete # %s?', $pais['Pais']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Cidades'); ?></h3>
	<?php if (!empty($pais['Cidade'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Pais Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pais['Cidade'] as $cidade): ?>
		<tr>
			<td><?php echo $cidade['id']; ?></td>
			<td><?php echo $cidade['nome']; ?></td>
			<td><?php echo $cidade['pais_id']; ?></td>
			<td><?php echo $cidade['created']; ?></td>
			<td><?php echo $cidade['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'cidades', 'action' => 'view', $cidade['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'cidades', 'action' => 'edit', $cidade['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'cidades', 'action' => 'delete', $cidade['id']), null, __('Are you sure you want to delete # %s?', $cidade['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Obras'); ?></h3>
	<?php if (!empty($pais['Obra'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Nome'); ?></th>
		<th><?php echo __('Imagem'); ?></th>
		<th><?php echo __('Ano Inicio'); ?></th>
		<th><?php echo __('Ano Fim'); ?></th>
		<th><?php echo __('Tamanho Obra'); ?></th>
		<th><?php echo __('Descricao'); ?></th>
		<th><?php echo __('Tags'); ?></th>
		<th><?php echo __('Obra Tipos Id'); ?></th>
		<th><?php echo __('Instituicao Id'); ?></th>
		<th><?php echo __('Pais Id'); ?></th>
		<th><?php echo __('Cidade Id'); ?></th>
		<th><?php echo __('Artista Id'); ?></th>
		<th><?php echo __('Incerta'); ?></th>
		<th><?php echo __('Circa'); ?></th>
		<th><?php echo __('Aproximado'); ?></th>
		<th><?php echo __('Iconografia Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($pais['Obra'] as $obra): ?>
		<tr>
			<td><?php echo $obra['id']; ?></td>
			<td><?php echo $obra['nome']; ?></td>
			<td><?php echo $obra['imagem']; ?></td>
			<td><?php echo $obra['ano_inicio']; ?></td>
			<td><?php echo $obra['ano_fim']; ?></td>
			<td><?php echo $obra['tamanho_obra']; ?></td>
			<td><?php echo $obra['descricao']; ?></td>
			<td><?php echo $obra['tags']; ?></td>
			<td><?php echo $obra['obra_tipos_id']; ?></td>
			<td><?php echo $obra['instituicao_id']; ?></td>
			<td><?php echo $obra['pais_id']; ?></td>
			<td><?php echo $obra['cidade_id']; ?></td>
			<td><?php echo $obra['artista_id']; ?></td>
			<td><?php echo $obra['incerta']; ?></td>
			<td><?php echo $obra['circa']; ?></td>
			<td><?php echo $obra['aproximado']; ?></td>
			<td><?php echo $obra['iconografia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'obras', 'action' => 'view', $obra['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'obras', 'action' => 'edit', $obra['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'obras', 'action' => 'delete', $obra['id']), null, __('Are you sure you want to delete # %s?', $obra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
