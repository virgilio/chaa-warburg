<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php
    echo $this->Form->create(false, array(
        'class' => 'form-horizontal',
        'url' => array('controller' => 'cidades', 'action' => 'add'),
        'onsubmit' => 'return addCidade(this);',
        'id' => 'CidadeAddForm'
    ));
?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome da cidade</label>
    <div class="controls">
      <?php echo $this->Form->input('Cidade.nome', array('label' => '')); ?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="pais_id">País</label>
    <div id="select-pais" class="controls">
      <?php echo $this->Form->input('Cidade.pais_id',
      array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o país')); ?>
    </div>
  </div>
</fieldset>
