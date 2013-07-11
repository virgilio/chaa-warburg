<?php echo $this->Form->create('ObrasRelacionada', 
                array('class' => 'form-horizontal', 
                      'action' => 'edit',
                      'onsubmit' => 'return editRelacao(this);')); ?>
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
</fieldset>
