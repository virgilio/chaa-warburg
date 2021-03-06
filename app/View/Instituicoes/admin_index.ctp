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
			<th class="actions"><?php echo __('Ação'); ?></th>
	</tr>
	<?php foreach ($instituicoes as $instituicao): ?>
	<tr>
		<td><?php echo h($instituicao['Instituicao']['nome']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($instituicao['Cidade']['nome'], array('controller' => 'cidades', 'action' => 'edit', $instituicao['Cidade']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $instituicao['Instituicao']['id'])); ?>
            <?php echo $this->Form->postLink(
                __('Deletar'),
                array('action' => 'delete', $instituicao['Instituicao']['id']),
                array('confirm' => __('Tem certeza que deseja deletar # %s?', $instituicao['Instituicao']['id']))); ?>
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
