<?php $this->Html->script("ajax-pais.js", array("inline" => false)); ?>
<?php echo $this->Form->create('Pais', 
                array('class' => 'form-horizontal', 
                      'action' => 'add',
                      'onsubmit' => 'return addPais(this);')); ?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome do país</label>
    <div class="controls">
      <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
    </div>
  </div>
</fieldset>

