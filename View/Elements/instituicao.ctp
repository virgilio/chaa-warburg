<div class="instituicoes form">
  <?php echo $this->Form->create('Instituicao', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <legend><?php echo __('Adicionar Instituição'); ?></legend>
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
        array('label' => '', 'class' => 'fixmeinput_chosen', 'data-placeholder' => 'Selecione a cidade')); ?>
      </div>
    </div>
  </fieldset>
  <div class="control-group">
    <label class="control-label" for="singlebutton"></label>
    <div class="controls">
      <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn')); ?>
    </div>
  </div>
</div>


