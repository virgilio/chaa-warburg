<div class="obraTipos index container">
	<div class="row">
		<div class="span8">
			<h2><?php echo __('Técnicas'); ?></h2>
		</div>
		<div class="span4">
			<?php echo $this->Html->link('Cadastrar técnica', array('controller' => 'obra_tipos','action' => 'add'), array('class' => 'btn_admin')); ?>
		</div>
	</div>
	<table class="lista_admin" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($obraTipos as $obraTipo): ?>
	<tr>
		<td><?php echo h($obraTipo['ObraTipo']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $obraTipo['ObraTipo']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $obraTipo['ObraTipo']['id']), null, __('Are you sure you want to delete # %s?', $obraTipo['ObraTipo']['id'])); ?>
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