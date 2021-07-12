<?php $this->Html->script("ajax-relacionadas.js", array("inline" => false)); ?>
<?php
    echo $this->Form->create(false, array(
        'class' => 'form-horizontal',
        'url' => array('controller' => 'obras_relacionadas', 'action' => 'add'),
        'onsubmit' => 'return addRelacionada(this);',
        'id' => 'ObrasRelacionadaAddForm'
    ));
?>
<fieldset>
  <?php
    echo $this->Form->input(
      'ObrasRelacionada.obra_id',
      array('type' => 'hidden',
            'value' => $this->request->data['Obra']['id']));
    echo $this->Form->input(
      'ObrasRelacionada.relacionada_id',
      array('type' => 'hidden', 'value' => ''));
  ?>
  <div class="control-group">
    <label class="control-label" for="descricao">Descrição</label>
    <div class="controls">
      <?php echo $this->Form->input('ObrasRelacionada.descricao', array('label' => '')); ?>
    </div>
  </div>
</fieldset>
