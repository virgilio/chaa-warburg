<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php echo $this->Form->create('Iconografia', 
                array('class' => 'form-horizontal', 
                      'action' => 'add',
                      'onsubmit' => 'return addIconografia(this);')); ?>
<fieldset>
  <legend><?php echo __('Adicionar Iconografia'); ?></legend>
  <div class="control-group">
    <label class="control-label" for="nome">Nome da iconografia</label>
    <div class="controls">
      <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
    </div>
  </div>
</fieldset>