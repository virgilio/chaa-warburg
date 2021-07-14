<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php
    echo $this->Form->create(false, array(
        'class' => 'form-horizontal',
        'url' => array('controller' => 'paises', 'action' => 'add'),
        'onsubmit' => 'return addPais(this);',
        'id' => 'PaisAddForm'
    ));
?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome do país</label>
    <div class="controls">
      <?php echo $this->Form->input('Pais.nome', array('label' => '')); ?>
    </div>
  </div>
</fieldset>
