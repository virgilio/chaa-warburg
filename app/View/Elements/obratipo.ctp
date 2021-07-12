<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php
    echo $this->Form->create(false, array(
        'class' => 'form-horizontal',
        'url' => array('controller' => 'obra_tipos','action' => 'add'),
        'onsubmit' => 'return addObraTipo(this);',
        'id' => 'ObraTipoAddForm'
    ));
?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome da técnica</label>
    <div class="controls">
      <?php echo $this->Form->input('ObraTipo.nome', array('label' => '')); ?>
    </div>
  </div>
</fieldset>


