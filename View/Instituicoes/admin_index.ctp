<?php 
	$this->Html->css("admin.css", null, array("inline" => false));
?>
<div class="instituicoes index container">
	<div class="row">
	    <div class="span8">
			<h2><?php echo __('Instituições'); ?></h2>
		</div>
	    <div class="span4">
	      <?php echo $this->Html->link('Cadastrar instituição', array('controller' => 'instituicoes','action' => 'add'), array('class' => 'btn_admin')); ?>
	    </div>
 	</div>
	<table class="lista_admin" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('cidade_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($instituicoes as $instituicao): ?>
	<tr>
		<td><?php echo h($instituicao['Instituicao']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($instituicao['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'edit', $instituicao['Cidade']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $instituicao['Instituicao']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $instituicao['Instituicao']['id']), null, __('Are you sure you want to delete # %s?', $instituicao['Instituicao']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Instituicao'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
