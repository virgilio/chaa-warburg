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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Artistas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
