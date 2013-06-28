<div class="cidades form container">
  <div class="row">
    <div class="span7">
      <h2><?php echo __('Editar Cidade'); ?></h2>
    </div>
    <div class="span5">
      <?php echo $this->Html->link('Ver cidades', array('controller' => 'cidades','action' => 'index'), array('class' => 'btn_admin')); ?>
      <?php echo $this->Form->postLink(__('Deletar cidade'), array('action' => 'delete', $this->request->data['Cidade']['id']), 
      array('class' => 'btn_admin'), __('Are you sure you want to delete # %s?', $this->request->data['Cidade']['id'])); ?>
    </div>
  </div>
  <?php echo $this->Form->create('Cidade', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <?php echo $this->Form->input('id');?>
    <div class="control-group">
      <label class="control-label" for="nome">Nome da cidade</label>
      <div class="controls">
	<?php echo $this->Form->input('nome', array('label' => '')); ?>		    
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="pais_id">País</label>
      <div id="select-pais" class="controls">
        <?php echo $this->Form->input('pais_id',
        array('label' => '', 'class' => 'input_chosen', 'data-placeholder' =>
        'Selecione o país')); ?>
        <!-- Botao para abrir modal de adicionar item -->
      </div>
      <a href="#add-pais" role="button" class="btn" data-toggle="modal">Novo país</a>
    </div>
  </fieldset>
  <div class="control-group">
    <label class="control-label" for="singlebutton"></label>
    <div class="controls">
      <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn')); ?>
    </div>
  </div>
</div>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar Pais', 
                                'form' => 'pais')); ?>


