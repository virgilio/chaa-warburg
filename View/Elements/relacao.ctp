<?php
    echo $this->Form->create(false, array(
        'class' => 'form-horizontal',
        'url' => array('controller' => 'obras_relacionadas', 'action' => 'edit'),
        'onsubmit' => 'return editRelacao(this);'
    ));
?>
<fieldset>
  <?php
    echo $this->Form->input('id');
  ?>
  <div class="control-group">
    <label class="control-label">Descrição</label>
    <div class="controls">
      <?php
        echo $this->Form->input('descricao', array('label' => false));
      ?>
    </div>
  </div>
  <?php
    if('admin' == $auth['role']) {
  ?>
  <div class="control-group">
    <label class="control-label">Usuário</label>
    <div class="controls">
      <?php
        echo $this->Form->input('user_id', array('label' => false, 'empty' => true));
      ?>
    </div>
  </div>
  <?php
    }
  ?>
</fieldset>
