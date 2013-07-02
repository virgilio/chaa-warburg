<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php echo $this->Form->create('ObraTipo', 
                array('class' => 'form-horizontal', 
                      'action' => 'add',
                      'onsubmit' => 'return addObraTipo(this);')); ?>

<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome da técnica</label>
    <div class="controls">
      <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
    </div>
  </div>
</fieldset>


