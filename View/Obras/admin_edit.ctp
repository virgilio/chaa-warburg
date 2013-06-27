<?php 
   $this->Html->script("main.js", array("inline" => false));
   $this->Html->script("jquery.Jcrop.min.js", array("inline" => false));
   $this->Html->script("script.js", array("inline" => false));
   $this->Html->css('jquery.Jcrop.min.css', null, array("inline" => false));
?>
<style type="text/css">
  .jcrop img {max-width: none;}
</style>
<div class="obras form">
  <?php //echo $this->Form->create('Obra', array('class' => 'form-horizontal')); ?>
  <?php echo $this->Form->create('Obra', array('enctype' =>
  'multipart/form-data', 'class' => 'form-horizontal')); ?>
  <input type="hidden" id="x1" name="data[Thumb][x1]" />
  <input type="hidden" id="y1" name="data[Thumb][y1]" />
  <input type="hidden" id="x2" name="data[Thumb][x2]" />
  <input type="hidden" id="y2" name="data[Thumb][y2]" />
  
  <fieldset>
    <legend><?php echo __('Editar obra'); ?></legend>
    <?php echo $this->Form->input('id'); ?>
    <div class="pull-left">
      <?php echo $this->Form->input('imagem', array('type' => 'file', 'id' =>
    'image_file', 'onchange' => 'fileSelectHandler()')); ?>
  
      <div class="step2">
        <h4>Selecione o Thumbnail desejado</h4>
        <div class="container">
          <div class="span6 offset2 jcrop">            
            <?php echo $this->Html->image(('obras/' . $this->Form->value('Obra.imagem')), 
                        array('alt' => $this->Form->value('Obra.imagem'), 'border' =>
                              '0', 'id' => 'preview'));
            ?>
            <?php echo $this->Html->image(('obras/thumbs/' . $this->Form->value('Obra.imagem')), 
                        array('alt' => $this->Form->value('Obra.imagem'), 'border' =>
                              '0'));
            ?>
          </div>
        </div>
        <input type="hidden" id="filesize" name="data[Thumb][filesize]" />
        <input type="hidden" id="filetype" name="data[Thumb][filetype]" />
        <input type="hidden" id="filedim" name="data[Thumb][filedim]" />
        <input type="hidden" id="w" name="data[Thumb][w]" />
        <input type="hidden" id="h" name="data[Thumb][h]" />
        
      </div>
   
      <div class="control-group">
	<label class="control-label" for="nome">Nome da obra</label>
	<div class="controls">
	  <?php echo $this->Form->input('nome', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
        <label class="control-label" for="artista_id">Artista</label>
        <div class="controls">
          <?php echo $this->Form->input('artista_id',
          array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o artista')); ?>
        </div>
      </div>
      <!--<div class="control-group">
	<label class="control-label" for="imagem">Imagem</label>
	<div class="controls">
	  <?php echo $this->Form->input('imagem', array('label' => '')); ?>		    
	</div>
      </div>-->
      <div class="control-group">
	<label class="control-label" for="ano_inicio">Ano início</label>
	<div class="controls">
	  <?php echo $this->Form->input('ano_inicio', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
	<label class="control-label" for="ano_fim">Ano fim</label>
	<div class="controls">
	  <?php echo $this->Form->input('ano_fim', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
	<label class="control-label" for="tamanho_obra">Tamanho da obra</label>
	<div class="controls">
	  <?php echo $this->Form->input('tamanho_obra', array('label' => '')); ?>		    
	</div>
      </div>
      <!-- Textarea -->
      <div class="control-group">
	<label class="control-label" for="descricao">Descrição</label>
	<div class="controls">                     
	  <?php echo $this->Form->input('descricao', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
	<label class="control-label" for="tags">Palavras-chave</label>
	<div class="controls">
	  <?php echo $this->Form->input('tags', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
        <label class="control-label" for="obra_tipos_id">Tipo de obra</label>
        <div class="controls">
          <?php echo $this->Form->input('obra_tipos_id',
          array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o tipo de obra')); ?>
        </div>
      </div>
      <div class="control-group">
	<label class="control-label" for="aproximado">Aproximado</label>
	<div class="controls">
	  <?php echo $this->Form->input('aproximado', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
        <label class="control-label" for="instituicao_id">Instituição</label>
        <div class="controls">
          <?php echo $this->Form->input('instituicao_id',
          array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a Instituição')); ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="pais_id">País</label>
        <div class="controls">
          <?php echo $this->Form->input('pais_id',
          array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o país')); ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="cidade_id">Cidade</label>
        <div class="controls">
          <?php echo $this->Form->input('cidade_id',
          array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a cidade')); ?>
        </div>
      </div>
      <div class="control-group">
	<label class="control-label" for="incerta">Incerta</label>
	<div class="controls">
	  <?php echo $this->Form->input('incerta', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
	<label class="control-label" for="circa">Circa</label>
	<div class="controls">
	  <?php echo $this->Form->input('circa', array('label' => '')); ?>		    
	</div>
      </div>
      <div class="control-group">
        <label class="control-label" for="tags">Iconografia</label>
        <div class="controls">
          <?php echo $this->Form->input('iconografia_id', 
          array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a iconografia')); ?>
        </div>
      </div>
    </div>
    <div class="pull-left">
      <div class="control-group">
	<label class="control-label" for="tags">Obras relacionadas</label>
	<div class="controls">
	  <?php echo $this->Form->input('Relacionada',
	  array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o nome da obra')); ?>
	</div>
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
