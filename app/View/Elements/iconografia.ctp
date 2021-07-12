<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php
    echo $this->Form->create(false, array(
        'class' => 'form-horizontal',
        'url' => array('controller' => 'iconografias', 'action' => 'add'),
        'onsubmit' => 'return addIconografia(this);',
        'id' => 'IconografiaAddForm'
    ));
?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome da iconografia</label>
    <div class="controls">
      <?php echo $this->Form->input('Iconografia.nome', array('label' => '')); ?>
    </div>
  </div>
</fieldset>
