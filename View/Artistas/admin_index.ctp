<?php 
	$this->Html->css("admin.css", null, array("inline" => false));
?>
<div class="artistas index container">
	<div class="row">
	    <div class="span8">
			<h2><?php echo __('Artistas'); ?></h2>
		</div>
	    <div class="span4">
	      <?php echo $this->Html->link('Cadastrar artista', array('controller' => 'artistas','action' => 'add'), array('class' => 'btn_admin')); ?>
	    </div>
 	</div>
	<table class="lista_admin" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($artistas as $artista): ?>
	<tr>
		<td><?php echo h($artista['Artista']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $artista['Artista']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $artista['Artista']['id']), null, __('Are you sure you want to delete # %s?', $artista['Artista']['id'])); ?>
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