<?php 
	$this->Html->css("admin.css", null, array("inline" => false));
?>
<div class="paises index container">
	<div class="row">
	    <div class="span8">
			<h2><?php echo __('Países'); ?></h2>
		</div>
	    <div class="span4">
	      <?php echo $this->Html->link('Cadastrar país', array('controller' => 'paises','action' => 'add'), array('class' => 'btn_admin')); ?>
	    </div>
 	</div>
	<table class="lista_admin" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($paises as $pais): ?>
	<tr>
		<td><?php echo h($pais['Pais']['nome']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $pais['Pais']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $pais['Pais']['id']), null, __('Tem certeza que deseja deletar # %s?', $pais['Pais']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próxima') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
