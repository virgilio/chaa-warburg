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
      <div class="controls">
        <span id="select-cidade">
          <?php echo $this->Form->input('cidade_id',
          array('label' => '', 'class' => 'input_chosen', 'empty' => true,
          'data-placeholder' => 'Selecione a cidade')); ?>
        </span>
      </div>
      <a href="#add-cidade" role="button" class="btn btn-info offset2"
         data-toggle="modal">Nova cidade</a>
      <a href="#add-pais" role="button" class="btn btn-info"
         data-toggle="modal">Novo país</a>
    </div>
  </fieldset>
  <div class="control-group">
    <label class="control-label" for="singlebutton"></label>
    <div class="controls">
      <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>
    </div>
  </div>
</div>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar Cidade', 
                                'form' => 'cidade')); ?>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar País', 
                                'form' => 'pais')); ?>

