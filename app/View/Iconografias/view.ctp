<div class="iconografias view">
<h2><?php  echo __('Iconografia'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($iconografia['Iconografia']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($iconografia['Iconografia']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($iconografia['Iconografia']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($iconografia['Iconografia']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="related">
	<h3><?php echo __('Related Obras'); ?></h3>
	<?php if (!empty($iconografia['Obra'])): ?>
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
		<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($iconografia['Obra'] as $obra): ?>
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
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'obras', 'action' => 'edit', $obra['id'])); ?>
				<?php echo $this->Form->postLink(__('Deletar'), array('controller' => 'obras', 'action' => 'delete', $obra['id']), null, __('Tem certeza que deseja deletar # %s?', $obra['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
