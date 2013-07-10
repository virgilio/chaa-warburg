<div class="iconografias form">
  <?php echo $this->Form->create('Iconografia', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <legend><?php echo __('Adicionar Iconografia'); ?></legend>
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
      <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>
    </div>
  </div>
</div>
