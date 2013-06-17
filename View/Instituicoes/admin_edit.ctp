<div class="instituicoes form">
<?php echo $this->Form->create('Instituicao', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Editar Instituição'); ?></legend>
		<?php echo $this->Form->input('id');?>
		<div class="control-group">
		  <label class="control-label" for="nome">Nome da Instituição</label>
		  <div class="controls">
		    <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
		  </div>
		</div>
		<div class="control-group">
          <label class="control-label" for="cidade_id">Cidade</label>
          <div class="controls">
            <?php echo $this->Form->input('cidade_id',
                        array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a cidade')); ?>
          </div>
        </div>
	</fieldset>
	<div class="control-group">
	  <label class="control-label" for="singlebutton"></label>
	  <div class="controls">
	    <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn')); ?>
	  </div>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Instituicao.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Instituicao.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Instituicoes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
