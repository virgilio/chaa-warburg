<div class="obras view">
<h2><?php  echo __('Obra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagem'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['imagem']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ano Inicio'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['ano_inicio']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ano Fim'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['ano_fim']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tamanho Obra'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['tamanho_obra']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descricao'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['descricao']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Tags'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['tags']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obra Tipo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obra['ObraTipo']['nome'], array('controller' => 'obra_tipos', 'action' => 'view', $obra['ObraTipo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instituicao'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obra['Instituicao']['nome'], array('controller' => 'instituicoes', 'action' => 'view', $obra['Instituicao']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Pais'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obra['Pais']['nome'], array('controller' => 'paises', 'action' => 'view', $obra['Pais']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cidade'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obra['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'view', $obra['Cidade']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Artista'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obra['Artista']['nome'], array('controller' => 'artistas', 'action' => 'view', $obra['Artista']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Incerta'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['incerta']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Circa'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['circa']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aproximado'); ?></dt>
		<dd>
			<?php echo h($obra['Obra']['aproximado']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Iconografia'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obra['Iconografia']['nome'], array('controller' => 'iconografias', 'action' => 'view', $obra['Iconografia']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Obra'), array('action' => 'edit', $obra['Obra']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Obra'), array('action' => 'delete', $obra['Obra']['id']), null, __('Are you sure you want to delete # %s?', $obra['Obra']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('action' => 'add')); ?> </li>
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
<div class="related">
	<h3><?php echo __('Related Obras'); ?></h3>
	<?php if (!empty($obra['Relacionada'])): ?>
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
		foreach ($obra['Relacionada'] as $relacionada): ?>
		<tr>
			<td><?php echo $relacionada['id']; ?></td>
			<td><?php echo $relacionada['nome']; ?></td>
			<td><?php echo $relacionada['imagem']; ?></td>
			<td><?php echo $relacionada['ano_inicio']; ?></td>
			<td><?php echo $relacionada['ano_fim']; ?></td>
			<td><?php echo $relacionada['tamanho_obra']; ?></td>
			<td><?php echo $relacionada['descricao']; ?></td>
			<td><?php echo $relacionada['tags']; ?></td>
			<td><?php echo $relacionada['obra_tipos_id']; ?></td>
			<td><?php echo $relacionada['instituicao_id']; ?></td>
			<td><?php echo $relacionada['pais_id']; ?></td>
			<td><?php echo $relacionada['cidade_id']; ?></td>
			<td><?php echo $relacionada['artista_id']; ?></td>
			<td><?php echo $relacionada['incerta']; ?></td>
			<td><?php echo $relacionada['circa']; ?></td>
			<td><?php echo $relacionada['aproximado']; ?></td>
			<td><?php echo $relacionada['iconografia_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'obras', 'action' => 'view', $relacionada['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'obras', 'action' => 'edit', $relacionada['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'obras', 'action' => 'delete', $relacionada['id']), null, __('Are you sure you want to delete # %s?', $relacionada['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Relacionada'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>