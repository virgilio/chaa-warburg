<div class="instituicoes form container">
  <div class="row">
    <div class="span7">
      <h2><?php echo __('Editar Instituição'); ?></h2>
    </div>
    <div class="span5">
      <?php 
         echo $this->Html->link('Ver Instituições', 
      array('controller' => 'instituicoes', 'action' => 'index'), array('class' =>
      'btn_admin')); 
      ?>
      <?php 
         echo $this->Form->postLink(__('Deletar Instituição'), 
      array('action' => 'delete', $this->request->data['Instituicao']['id']), 
      array('class' => 'btn_admin'), __('Tem certeza que deseja deletar # %s?', 
      $this->request->data['Instituicao']['id'])); 
      ?>
    </div>
  </div>
  <?php echo $this->Form->create('Instituicao', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <?php echo $this->Form->input('id');?>
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
