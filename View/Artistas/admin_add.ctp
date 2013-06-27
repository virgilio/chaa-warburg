<div class="artistas form">
<?php echo $this->Form->create('Artista', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar Artista'); ?></legend>
		<div class="control-group">
		  <label class="control-label" for="nome">Nome do artista</label>
		  <div class="controls">
		    <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
		  </div>
		</div>
		<div class="control-group">
          <label class="control-label" for="imagem">Imagem</label>
          <div class="controls">
            <?php echo $this->Form->input('imagem',
                        array('label' => '')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="biografia">Biografia</label>
          <div class="controls">
            <?php echo $this->Form->input('biografia',
                        array('label' => '')); ?>
          </div>
        </div>
	</fieldset>
	<div class="control-group">
	  <label class="control-label" for="singlebutton"></label>
	  <div class="controls">
	    <?php echo $this->Form->end(array('label' => 'Adicionar', 'class' => 'btn')); ?>
	  </div>
	</div>
</div>