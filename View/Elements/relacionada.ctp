<?php $this->Html->script("ajax-relacionadas.js", array("inline" => false)); ?>
<?php echo $this->Form->create('ObrasRelacionada', 
  array('class' => 'form-horizontal', 
        'action' => 'add',
        'onsubmit' => 'return addRelacionada(this);')); ?>
<fieldset>
  <?php
    echo $this->Form->input(
      'obra_id', 
      array('type' => 'hidden', 
            'value' => $this->request->data['Obra']['id']));
    echo $this->Form->input(
      'relacionada_id', 
      array('type' => 'hidden', 'value' => ''));
  ?>
  <div class="control-group">
    <label class="control-label" for="descricao">Descrição</label>
    <div class="controls">
      <?php echo $this->Form->input('descricao', array('label' => '')); ?>		    
    </div>
  </div>
</fieldset>
