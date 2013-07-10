<div class="artistas form container">
  <div class="row">
    <div class="span7">
      <h2><?php echo __('Editar Artista'); ?></h2>
    </div>
    <div class="span5">
      <?php echo $this->Html->link('Ver artistas', array('controller' => 'artistas','action' => 'index'), array('class' => 'btn_admin')); ?>
      <?php echo $this->Form->postLink(__('Deletar artista'), array('action' => 'delete', $this->request->data['Artista']['id']), 
      array('class' => 'btn_admin'), __('Tem certeza que deseja deletar # %s?', $this->request->data['Artista']['id'])); ?>
    </div>
  </div>
  <?php echo $this->Form->create('Artista', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <?php echo $this->Form->input('id'); ?>		    
    <div class="control-group">
      <label class="control-label" for="nome">Nome do artista</label>
      <div class="controls">
	<?php echo $this->Form->input('nome', array('label' => '')); ?>		    
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="imagem">Imagem</label>
      <div class="controls">
        <?php echo $this->Form->input('imagem',
        array('label' => '')); ?>
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="biografia">Biografia</label>
      <div class="controls">
        <?php echo $this->Form->input('biografia',
        array('label' => '')); ?>
      </div>
    </div>
  </fieldset>
  <div class="control-group">
    <label class="control-label" for="singlebutton"></label>
    <div class="controls">
      <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-success')); ?>
    </div>
  </div>
</div>
