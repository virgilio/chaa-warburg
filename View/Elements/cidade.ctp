<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php echo $this->Form->create('Cidade', 
                array('class' => 'form-horizontal', 
                      'action' => 'add',
                      'onsubmit' => 'return addCidade(this);')); ?>
<fieldset>
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
  </div>
</fieldset>
