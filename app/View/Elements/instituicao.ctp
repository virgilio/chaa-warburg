<?php $this->Html->script("ajax-add-inline.js", array("inline" => false)); ?>
<?php
    echo $this->Form->create(false, array(
        'class' => 'form-horizontal',
        'url' => array('controller' => 'instituicoes', 'action' => 'add'),
        'onsubmit' => 'return addInstituicao(this);',
        'id' => 'InstituicaoAddForm'
    ));
?>
<fieldset>
  <div class="control-group">
    <label class="control-label" for="nome">Nome da Instituição</label>
    <div class="controls">
      <?php echo $this->Form->input('Instituicao.nome', array('label' => false)); ?>
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="cidade_id">Cidade</label>
    <div id="select-cidade" class="controls">
      <?php echo $this->Form->input('Instituicao.cidade_id',
          array('label' => false,
                'class' => 'input_chosen',
                'empty'  => true,
                'data-placeholder' => 'Selecione a cidade')); ?>
    </div>
  </div>
</fieldset>



