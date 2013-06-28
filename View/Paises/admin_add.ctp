<div class="paises form">
  <?php echo $this->Form->create('Pais', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <legend><?php echo __('Adicionar País'); ?></legend>
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
      <?php echo $this->Form->end(array('label' => 'Adicionar', 'class' => 'btn')); ?>
    </div>
  </div>
</div>
