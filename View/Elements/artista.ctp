<?php 
  $this->Html->script('fileHandler.js', array('inline' => false));
  $this->Html->script("ajax-add-inline.js", array("inline" => false));
?>
<?php echo $this->Form->create('Artista', 
                         array('enctype' => 'multipart/form-data', 
                               'class' => 'form-horizontal', 
                               'action' => 'add',
                               'onsubmit' => 'return addArtista(this);')); ?>
<div class="container">
  <fieldset>
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
</div>
