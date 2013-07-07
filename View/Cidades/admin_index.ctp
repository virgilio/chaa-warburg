<?php 
	$this->Html->css("admin.css", null, array("inline" => false));
?>
<div class="cidades index container">
	<div class="row">
	    <div class="span8">
			<h2><?php echo __('Cidades'); ?></h2>
		</div>
	    <div class="span4">
	      <?php echo $this->Html->link('Cadastrar cidade', array('controller' => 'cidades','action' => 'add'), array('class' => 'btn_admin')); ?>
	    </div>
 	</div>
	<table class="lista_admin" cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('nome'); ?></th>
			<th><?php echo $this->Paginator->sort('pais_id'); ?></th>
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($cidades as $cidade): ?>
	<tr>
		<td><?php echo h($cidade['Cidade']['nome']); ?></td>
		<td>
			<?php echo $this->Html->link($cidade['Pais']['nome'], array('controller' => 'paises', 'action' => 'edit', $cidade['Pais']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cidade['Cidade']['id'])); ?>
			<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $cidade['Cidade']['id']), null, __('Tem certeza que deseja deletar # %s?', $cidade['Cidade']['id'])); ?>
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
