<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php echo $this->Form->create('Instituicao', 
                array('class' => 'form-horizontal', 
                      'action' => 'add',
                      'onsubmit' => 'return addInstituicao(this);')); ?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome da Instituição</label>
    <div class="controls">
      <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="cidade_id">Cidade</label>
    <div id="select-cidade" class="controls">
      <?php echo $this->Form->input('cidade_id',
      array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a cidade')); ?>
    </div>
  </div>
</fieldset>



