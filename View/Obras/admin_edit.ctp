<?php 
   $this->Html->script("main.js", array("inline" => false));
   $this->Html->script("jquery.Jcrop.min.js", array("inline" => false));
   $this->Html->script("script.js", array("inline" => false));
   $this->Html->script("nicedit/nicEdit.js", array("inline" => false));
   $this->Html->css('jquery.Jcrop.min.css', null, array("inline" => false));
?>
<style type="text/css">
  .jcrop img {max-width: none;}
</style>

<h2>Editar obra</h2>

<ul class="nav nav-tabs" id="step-bar">
  <li>
    <a href="#edit-img-step1">
      <i class="icon-picture"></i> Imagem 
      <i class="icon-caret-right"></i>
    </a>
  </li>
  <li class="active">
    <a href="#edit-img-step2">
      <i class="icon-file-text-alt"></i> Informações 
      <i class="icon-caret-right"></i>
    </a>
  </li>
  <li>
    <a href="#edit-img-step3">
      <i class="icon-link"></i> Imagens relacionadas
    </a>
  </li>
</ul>

  <?php //echo $this->Form->create('Obra', array('class' => 'form-horizontal')); ?>
  <?php echo $this->Form->create('Obra', array('enctype' =>
  'multipart/form-data', 'class' => 'form-horizontal')); ?>
  
  <input type="hidden" id="x1" name="data[Thumbnail][x1]" value="<?php echo $this->request->data['Thumbnail']['x1']; ?>" />
  <input type="hidden" id="y1" name="data[Thumbnail][y1]" value="<?php echo $this->request->data['Thumbnail']['y1']; ?>" />
  <input type="hidden" id="x2" name="data[Thumbnail][x2]" value="<?php echo $this->request->data['Thumbnail']['x2']; ?>" />
  <input type="hidden" id="y2" name="data[Thumbnail][y2]" value="<?php echo $this->request->data['Thumbnail']['y2']; ?>" />

  <fieldset>
   
    <?php echo $this->Form->input('id'); ?>

    <div class="obras form tab-content">
    <!-- Início step1 -->    
        <div id="edit-img-step1" class="tab-pane">
          <h3>Editar imagem e miniatura</h3>
          <?php echo $this->Form->input('imagem', array('type' => 'file', 'id' =>
        'image_file', 'onchange' => 'fileSelectHandler()')); ?>
      
          <div class="step2">
            <h4>Selecione a miniatura desejada</h4>
            <div class="container">
              <div class="span6 offset2 jcrop">            
                <?php echo $this->Html->image(('obras/' . $this->Form->value('Obra.imagem')), 
                            array('alt' => $this->Form->value('Obra.imagem'), 'border' =>
                                  '0', 'id' => 'preview', 'onload' => 'loadPreview()'));
                ?>
                <?php echo $this->Html->image(('obras/thumbs/' . $this->Form->value('Obra.imagem')), 
                            array('alt' => $this->Form->value('Obra.imagem'), 'border' => '0'));
                ?>
              </div>
            </div>
            <input type="hidden" id="filesize" name="data[Thumbnail][filesize]" />
            <input type="hidden" id="filetype" name="data[Thumbnail][filetype]" />
            <input type="hidden" id="filedim" name="data[Thumbnail][filedim]" />
            <input type="hidden" id="w" name="data[Thumbnail][w]" />
            <input type="hidden" id="h" name="data[Thumbnail][h]" />
            
          </div>
       </div>
    <!-- Fim step1 -->

    <!-- Início step2 -->
       <div id="edit-img-step2" class="tab-pane active">
          <h3>Informações da obra</h3>
          <div class="control-group">
          	<label class="control-label" for="nome">Nome da obra</label>
          	<div class="controls">
          	  <?php echo $this->Form->input('nome', array('class'=>'input-xlarge','label' => '')); ?>		    
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
            <label class="control-label" for="aproximado">Aproximado</label>
            <div class="controls">
              <?php echo $this->Form->input('aproximado', array('label' => '')); ?>       
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
            <label class="control-label" for="instituicao_id">Instituição</label>
            <div class="controls">
              <?php echo $this->Form->input('instituicao_id',
              array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a Instituição')); ?>
            </div>
          </div>
          <a href="#add-instituicao" role="button" class="btn"
             data-toggle="modal">Nova Instituição</a>
          <a href="#add-cidade" role="button" class="btn"
             data-toggle="modal">Nova cidade</a>
          <a href="#add-pais" role="button" class="btn"
             data-toggle="modal">Novo país</a>
          <!--<div class="control-group">
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
          </div>-->
          <div class="control-group">
            <label class="control-label" for="tags">Iconografia</label>
            <div id="select-iconografia" class="controls">
              <?php echo $this->Form->input('iconografia_id', 
              array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a iconografia')); ?>
            </div>
          </div>
          <a href="#add-iconografia" role="button" class="btn"
               data-toggle="modal">Nova Iconografia</a>
        </div>
    <!-- Fim step2 -->

    <!-- Início step3 -->
        <div  id="edit-img-step3" class="tab-pane">
          <div class="control-group">
            <h3>Imagens relacionadas</h3>
          	<label class="control-label" for="tags">Obras relacionadas</label>
          	<div class="controls">
          	  <?php echo $this->Form->input('Relacionada',
          	  array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o nome da obra')); ?>
          	</div>
          </div>
        </div>
    <!-- Fim step3 -->
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
                          array('titulo' => 'Adicionar Instituição', 
                                'form' => 'instituicao')); ?>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar Cidade', 
                                'form' => 'cidade')); ?>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar País', 
                                'form' => 'pais')); ?>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar Iconografia', 
                                'form' => 'iconografia')); ?>
<?php $this->Html->script("admin.js", array("inline" => false)); ?>
