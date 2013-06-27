<div class="iconografias form container">
        <div class="row">
            <div class="span7">
                <h2><?php echo __('Editar iconografia'); ?></h2>
            </div>
            <div class="span5">
                <?php echo $this->Html->link('Ver iconografias', array('controller' => 'iconografias','action' => 'index'), array('class' => 'btn_admin')); ?>
                <?php echo $this->Form->postLink(__('Deletar iconografia'), array('action' => 'delete', $this->request->data['Iconografia']['id']), 
                array('class' => 'btn_admin'), __('Are you sure you want to delete # %s?', $this->request->data['Iconografia']['id'])); ?>
            </div>
        </div>
<?php echo $this->Form->create('Iconografia', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<?php echo $this->Form->input('id');?>
		<div class="control-group">
		  <label class="control-label" for="nome">Nome da iconografia</label>
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
