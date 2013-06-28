<div class="cidades form">
<?php echo $this->Form->create('Cidade', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Cidade'); ?></legend>
		<div class="control-group">
		  <label class="control-label" for="nome">Nome da cidade</label>
		  <div class="controls">
		    <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
		  </div>
		</div>
		<div class="control-group">
          <label class="control-label" for="pais_id">País</label>
          <div id="select-pais" class="controls">
            <?php echo $this->Form->input('pais_id',
                        array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o país')); ?>
          </div>
          <a href="#add-pais" role="button" class="btn" data-toggle="modal">Novo país</a>
        </div>
	</fieldset>

	<div class="control-group">
	  <label class="control-label" for="singlebutton"></label>
	  <div class="controls">
	    <?php echo $this->Form->end(array('label' => 'Adicionar', 'class' => 'btn')); ?>
	  </div>
	</div>
</div>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar Pais', 
                                'form' => 'pais')); ?>
