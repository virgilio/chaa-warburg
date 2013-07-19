<?php 
   $this->Html->script('fileHandler.js', array('inline' => false));
?>
<div class="artistas form">
  <?php echo $this->Form->create('Artista', array('enctype' =>
  'multipart/form-data', 'class' => 'form-horizontal')); ?>
  <fieldset>
    <legend><?php echo __('Adicionar Artista'); ?></legend>
    <div class="row-fluid">
      <div class="span6">
        <div class="control-group">
          <label class="control-label" for="nome">Nome do artista</label>
          <div class="controls">
	    <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
          </div>
        </div>
        <div class="control-group row-fluid">
          <label class="control-label" for="imagem">Imagem</label>
          <div class="controls">
            <?php echo $this->Form->input('imagem', array('label' => false, 'type' => 'file', 'id' =>
            'image_file_show', 'onchange' => 'fileHandler()')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="biografia">Biografia</label>
          <div class="controls">
            <?php echo $this->Form->input('biografia',
            array('label' => '')); ?>
          </div>
        </div>
      </div>
      <div class="span6">
        <img 
           src="" class="span4 img-polaroid"
           style="position: relative;" id="preview_show" />
      </div>
    </div>
  </fieldset>
  <div class="control-group">
    <label class="control-label" for="singlebutton"></label>
    <div class="controls">
      <?php echo $this->Form->end(array('label' => 'Adicionar', 'class' => 'btn btn-success')); ?>
    </div>
  </div>
</div>
