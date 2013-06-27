<div class="paises form container">
        <div class="row">
            <div class="span7">
                <h2><?php echo __('Editar País'); ?></h2>
            </div>
            <div class="span5">
                <?php echo $this->Html->link('Ver países', array('controller' => 'paises','action' => 'index'), array('class' => 'btn_admin')); ?>
                <?php echo $this->Form->postLink(__('Deletar país'), array('action' => 'delete', $this->request->data['Pais']['id']), 
                array('class' => 'btn_admin'), __('Are you sure you want to delete # %s?', $this->request->data['Pais']['id'])); ?>
            </div>
        </div>
<?php echo $this->Form->create('Pais', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<?php echo $this->Form->input('id');?>
		<div class="control-group">
		  <label class="control-label" for="nome">Nome do país</label>
		  <div class="controls">
		    <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
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
