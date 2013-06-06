<div class="obras form">
<?php echo $this->Form->create('Obra'); ?>
	<fieldset>
		<legend><?php echo __('Add Obra'); ?></legend>
	<?php
		echo $this->Form->input('nome');
		echo $this->Form->input('imagem');
		echo $this->Form->input('ano_inicio');
		echo $this->Form->input('ano_fim');
		echo $this->Form->input('tamanho_obra');
		echo $this->Form->input('descricao');
		echo $this->Form->input('tags');
		echo $this->Form->input('obra_tipos_id');
		echo $this->Form->input('instituicao_id');
		echo $this->Form->input('pais_id');
		echo $this->Form->input('cidade_id');
		echo $this->Form->input('artista_id');
		echo $this->Form->input('incerta');
		echo $this->Form->input('circa');
		echo $this->Form->input('aproximado');
		echo $this->Form->input('iconografia_id');
		echo $this->Form->input('Relacionada');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Obras'), array('action' => 'index')); ?></li>
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
