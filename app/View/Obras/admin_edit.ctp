<?php 
  $this->Html->script("main.js", array("inline" => false));
  //$this->Html->script("jquery.Jcrop.min.js", array("inline" => false));
  //$this->Html->script("script.js", array("inline" => false));
  $this->Html->script("image_handler.js", array("inline" => false));
  $this->Html->script("nicedit/nicEdit.js", array("inline" => false));
  //$this->Html->css('jquery.Jcrop.min.css', null, array("inline" => false));
  $this->Html->script("ajax-relacionadas.js", array("inline" => false));
  
  $this->Html->css('bootstrapSwitch.css', null, array('inline' =>
                                                      false)); 
  $this->Html->script('bootstrapSwitch.min.js', array('inline' => false));
?>
<style type="text/css">
  .jcrop img {max-width: 100%;}
  input[type=number]::-webkit-inner-spin-button,
  input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  input[type=number] {
    -moz-appearance:textfield;
  }
</style>

<h2>Editar obra 
  <?php 
    echo h(substr($this->request->data['Obra']['nome'], 0, 40))
    . (strlen($this->request->data['Obra']['nome']) > 40 ? '...' : ''); 
  ?>
</h2>

<?php echo $this->Form->create('Obra', array('enctype' =>
'multipart/form-data', 'class' => 'form-horizontal')); ?>

<ul class="nav nav-tabs" id="step-bar">
  <li>
    <a href="#edit-img-step1">
      <i class="icon-picture"></i> Imagem 
    </a>
  </li>
  <li class="active">
    <a href="#edit-img-step2">
      <i class="icon-file-text-alt"></i> Informações 
    </a>
  </li>
  <li>
    <a href="#edit-img-step3">
      <i class="icon-link"></i> Imagens relacionadas
    </a>
  </li>
  <li class="pull-right">
    <?php 
      echo $this->Form->button('Salvar', 
                               array(
                                 'type' => 'submit', 
                                 'class' => 'btn btn-success')); 
    ?>
  </li>
</ul>

<!--<input type="hidden" id="x1" name="data[Thumbnail][x1]" 
       value="<?php echo $this->request->data['Thumbnail']['x1']; ?>" />
<input type="hidden" id="y1" name="data[Thumbnail][y1]" 
       value="<?php echo $this->request->data['Thumbnail']['y1']; ?>" />
<input type="hidden" id="x2" name="data[Thumbnail][x2]" 
       value="<?php echo $this->request->data['Thumbnail']['x2']; ?>" />
<input type="hidden" id="y2" name="data[Thumbnail][y2]" 
       value="<?php echo $this->request->data['Thumbnail']['y2']; ?>" />-->


<?php echo $this->Form->input('id'); ?>

<div class="obras form tab-content">
  <!-- Início step1 -->    
  <div id="edit-img-step1" class="tab-pane container-fluid">
    <fieldset>
      <div class="row-fluid">
        <div class="span8">
          <h3>Editar imagem</h3>
          <?php 
            echo $this->Form->input(
              'imagem', 
              array('type' => 'file', 'id' =>
                    'image_file', 
                    'onchange' => 'ImageHandler.fileSelectHandler()')); ?>
        </div>
<!--
        <div class="span12">
          <label>Miniatura atual</label>
          <?php 
            echo $this->Html->image(
              ('obras/mini/' . $this->Form->value('Obra.imagem')), 
              array('alt' => $this->Form->value('Obra.imagem'), 
                    'border' => '0', 
                    'class' => 'img-polaroid'));
          ?>
        </div>
-->
      </div>
      <div class="row-fluid">
        <!--<div class="step2 span6 offset2">-->
          <h4>Imagem selecionada</h4>
          <div class="span10 jcrop" id="image-box">            
            <?php 
              echo $this->Html->image(
                ('obras/' . $this->Form->value('Obra.imagem')), 
                array('alt' => $this->Form->value('Obra.imagem'), 
                      'border' => '0', 
                      'id' => 'preview',
                    ));
            ?>               
          </div>
        <input type="hidden" 
               id="filesize" name="data[Thumbnail][filesize]" />
        <input type="hidden" 
               id="filetype" name="data[Thumbnail][filetype]" />
        <input type="hidden" 
               id="filedim" name="data[Thumbnail][filedim]" />
        <!--<input type="hidden" 
               id="w" name="data[Thumbnail][w]" />
        <input type="hidden" 
               id="h" name="data[Thumbnail][h]" />-->
      </div>
    </fieldset>
  </div>
  <!-- Fim step1 -->

  <!-- Início step2 -->
  <div id="edit-img-step2" class="tab-pane active">
    <fieldset>
      <h3>Informações da obra</h3>
      <div class="control-group">
        <label class="control-label" for="nome">Nome da obra</label>
        <div class="controls">
          <?php 
            echo $this->Form->input('nome', 
                                    array(
                                      'type' => 'textarea', 
                                      'class'=>'input-xlarge',
                                      'label' => false)); ?>		    
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="artista_id">Artista</label>
        <div class="controls">
          <span id="select-artista">
            <?php 
              echo $this->Form->input(
                'artista_id',
                array('label' => false, 
                      'class' => 'input_chosen', 
                      'empty'  => true,
                      'data-placeholder' => 'Selecione o artista')); 
            ?>
          </span>
          <ul class="unstyled inline pull-right">
            <li>                
              <a href="#add-artista" role="button" class="btn btn-info"
                 data-toggle="modal">Novo Artista</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="fieldset-data row-fluid">
        <h4><i class="icon-calendar"></i> Dados de data da obra</h4>
        <span>(deixe os campos abaixo em branco caso a data seja
        indeterminada)</span>
        <div class="control-group span5" id="ObraAnoFimFieldset">
          <label class="control-label" 
                 for="ano_fim">Ano da obra</label>
          
          <div class="controls">
            <div class="input-append">
              <?php 
                echo $this->Form->input(
                  'ano_fim', 
                  array('label' => false,
                        'style' => 'text-align: right;', 
                        'class' =>  'input-mini', 
                        'title' => 'Para data Antes de Cristo coloque o ano em negativo', 
                        'div' => false, 
                        'min' => 0)); 
              ?>
              <span class="add-on acdc" id="ano_fim_signal">
                <?php echo $this->Form->input('ano_fim_signal', array('label' => false,
                'hiddenField' => false, 'div' => false, 'type' => 'hidden',
                'value' => (isset($this->request->data['Obra']['ano_fim_signal']) ?
                $this->request->data['Obra']['ano_fim_signal'] : ''),
                'style' => 'display: none;')); ?>
                <span id="ano_fim_signal_label" title="Clique para alternar entre d.C. e a.C.">
                  <?php 
                   if(isset($this->request->data['Obra']['ano_fim_signal']) && 
                        $this->request->data['Obra']['ano_fim_signal'] != 0) {
                     echo $this->request->data['Obra']['ano_fim_signal'] == 1 ? 
                          'd.C' :
                          'a.C'; 
                   }
                  ?>
                </span>
              </span>
            </div>
          </div>
        
          <label class="control-label" for="ano_inicio">Ano de início</label>
          <div class="controls">
            <div class="input-append">
              <?php 
                echo $this->Form->input(
                  'ano_inicio', 
                  array('label' => false,
                        'style' => 'text-align: right;', 
                        'class' => 'input-mini', 
                        'title' => 'Para data Antes de Cristo' 
                        . ' coloque o ano em negativo', 
                        'div' => false, 'min' => 0));
              ?>
              <span class="add-on acdc" id="ano_inicio_signal">	    
                <?php 
                  echo $this->Form->input(
                    'ano_inicio_signal', 
                    array('label' => false, 
                          'hiddenField' => false, 
                          'div' => false, 
                          'type' => 'hidden', 
                          'style' => 'display: none;', 
                          'value' => 
                          (isset($this->request->data['Obra']['ano_inicio_signal']) ?
                           $this->request->data['Obra']['ano_inicio_signal'] : '')));
                ?>
                <span id="ano_inicio_signal_label" 
                      title="Clique para alternar entre d.C. e a.C.">
                  <?php 
                    if(isset($this->request->data['Obra']['ano_inicio_signal']) 
                       && $this->request->data['Obra']['ano_inicio_signal'] != 0) {
                      echo $this->request->data['Obra']['ano_inicio_signal'] == 1 ? 
                      'd.C' :
                      'a.C'; 
                    }
                  ?>
                </span>
              </span>
            </div>
          </div>       
        </div>
        <div class="span6">
          <div class="control-group">
            <label class="control-label" for="option1">
              Post quem (depois de)
            </label>
            <div class="controls">
              <div id="" class="make-switch postantequam" 
                   data-on="success" 
                   data-off="danger" 
                   data-on-label="<i class='icon-ok icon-white'></i>" 
                   data-off-label="<i class='icon-remove'></i>">
                <input 
                   type="radio" name="data[Obra][ante_post_quam]"
                   id="ObraAntePostQuam1" value="1"
                   <?php 
                     echo $this->request->data['Obra']['ante_post_quam'] == 1 
                     ? "checked" 
                     : ""; 
                   ?>    
                   />
                </div>
            </div>
            <label class="control-label" for="option2">
              Ante quem (antes de)
            </label>
            <div class="controls"> 
              <div id="option2" class="make-switch postantequam" 
                   data-on="success" 
                   data-off="danger" 
                   data-on-label="<i class='icon-ok icon-white'></i>" 
                   data-off-label="<i class='icon-remove'></i>">
                <input 
                   type="radio" name="data[Obra][ante_post_quam]" 
                   id="ObraAntePostQuam0" value="0"
                   <?php 
                     echo $this->request->data['Obra']['ante_post_quam'] == 0 
                     ? "checked" 
                     : ""; 
                     ?>    
                     />
                </div>
              </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="circa">Circa</label>
            <div class="controls">
              <div class="make-switch"
                   data-on="success" 
                   data-off="danger"  
                   data-on-label="<i class='icon-ok icon-white'></i>" 
                   data-off-label="<i class='icon-remove'></i>">
                <?php 
                  echo $this->Form->input('circa', 
                                          array('label' => false,
                                                'hiddenField' => true, 
                                                'div' => false, )); 
                ?>        
              </div>
            </div>
          </div>
          
          <div class="control-group">
            <label class="control-label" for="incerta">Incerta</label>
            <div class="controls">
              <div class="make-switch"
                   data-on="success" 
                   data-off="danger"  
                   data-on-label="<i class='icon-ok icon-white'></i>" 
                   data-off-label="<i class='icon-remove'></i>">
                <?php 
                  echo $this->Form->input('incerta', 
                                          array('label' => false,
                                                'hiddenField' => true, 
                                                'div' => false)); 
                ?>
              </div>
            </div>
          </div>
        </div>
      </div> <!-- Fim do fieldset de data -->
      
      <div class="control-group">
        <label class="control-label" for="tamanho_obra">Tamanho da obra</label>
        <div class="controls">
          <?php echo $this->Form->input('tamanho_obra', array('label' => '')); ?>	
        </div>	   
        <label class="control-label" for="aproximado">Aproximado?</label>
        <div class="controls">          
          <div class="make-switch"
               data-on="success" 
               data-off="danger"  
               data-on-label="<i class='icon-ok icon-white'></i>" 
               data-off-label="<i class='icon-remove'></i>">
            <?php echo $this->Form->input('aproximado', array('label' => false, 'hiddenField' => true, 'div' => false)); ?>       
          </div>
        </div>
      </div>
      
      <!-- Textarea -->
      <div class="control-group">
        <label class="control-label" for="descricao">Descrição</label>
        <div class="controls">                     
          <?php echo $this->Form->input('descricao', array('label' => false)); ?>		    
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="tags">Palavras-chave</label>
        <div class="controls">
          <?php echo $this->Form->input('tags', array('label' => false)); ?>		    
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="obra_tipos_id">Técnica</label>
        <div class="controls">
          <span id="select-obratipo">
            <?php echo $this->Form->input('obra_tipos_id',
            array('label' => '', 'class' => 'input_chosen', 'empty'  => true, 'data-placeholder'
            => 'Selecione o tipo de obra')); ?>
          </span>
          <ul class="unstyled inline pull-right">
            <li>
              <a href="#add-obratipo" role="button" class="btn btn-info"
                 data-toggle="modal">Nova Técnica</a>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="instituicao_id">Instituição</label>
        <div class="controls">
          <span id="select-instituicao" >
            <?php 
              echo $this->Form->input('instituicao_id',
                                      array('label' => false, 
                                            'class' => 'input_chosen', 
                                            'empty'  => true, 
                                            'data-placeholder' => 
                                            'Selecione a Instituição'
                                      )); 
            ?>
          </span>
          <ul class="unstyled inline pull-right">
            <li>
              <a href="#add-instituicao" role="button" class="btn btn-info"
                 data-toggle="modal">Nova Instituição</a>
            </li>
            <li>
              <a href="#add-cidade" role="button" class="btn btn-info"
                 data-toggle="modal">Nova cidade</a>
            </li>
            <li>
              <a href="#add-pais" role="button" class="btn btn-info"
                 data-toggle="modal">Novo país</a>
            </li>
          </ul>
        </div>
      </div>
      
      <div class="control-group">
        <label class="control-label" for="tags">Iconografia</label>
        <div class="controls">
          <span id="select-iconografia">
            <?php 
              echo $this->Form->input('iconografia_id', 
                                      array(
                                        'label' => false, 
                                        'class' => 'input_chosen', 
                                        'empty'  => true, 
                                        'data-placeholder' => 
                                        'Selecione a iconografia'
                                      )); 
            ?>
          </span>
          <ul class="unstyled inline pull-right">
            <li>                
              <a href="#add-iconografia" role="button" class="btn btn-info"
                 data-toggle="modal">Nova Iconografia</a>
            </li>
          </ul>
        </div>
      </div>
    </fieldset>
  </div>
  <!-- Fim step2 -->
  
  <!-- Início step3 -->
  <div id="edit-img-step3" class="tab-pane">
      <div class="row-fluid">
        <div class="span6">
          <h3>Adicionar imagem relacionada</h3>
          <div class="chosen-container">
            <?php 
              echo $this->Form->input(
                'get_imagem_url', 
                array('type' => 'hidden',
                      'value' => Router::url(
                        array('controller' => 'obras', 
                              'action' => 'get_imagem_by_id')
                      )
                ));
              echo $this->Form->input(
                'imagem_url', 
                array('type' => 'hidden',
                      'value' => Router::url(
                        array('admin' => false, 
                              'controller' => '', 'action' => 'img')
                      )
                ));
              echo $this->Form->input(
                'relacionadas', 
                array('label' => false,
                      'type' => 'select', 
                      'options' => $relacionadas, 
                      'data-placeholder' => 'Selecione a obra', 
                      'empty'  => true, 
                      'class' => 'input-chosen')
              );
            ?>
          </div>
          <a id="add-relacionada-button" 
             href="#add-relacionada" role="button"
             class="btn  btn-info"
             data-toggle="no-modal">Adicionar</a>
        </div>
        <div class="span3 thumbs-relacionadas">
          <label>Imagem principal</label>
          <?php 
                echo $this->Html->image(('obras/mini/' . $this->Form->value('Obra.imagem')), 
                                        array('alt' => $this->Form->value('Obra.imagem'), 'border' => '0', 'class' => 'img-polaroid'));
          ?>
        </div>
        <div class="span3 thumbs-relacionadas">
          <label>Imagem selecionada</label>
          <?php 
                echo $this->Html->image('semthumb.jpg', 
                                        array('id' => 'thumb-relacionada', 
                                              'alt' => 'Escolha uma imagem para relacionar', 
                                              'border' => '0', 'class' => 'img-polaroid'));
          ?>
        </div>
      </div>
          
      <div id="obras-relacionadas" class="related">
        <?php if (!empty($this->request->data['Relacionada']) || !empty($this->request->data['Relacionada2'])): ?>
        <?php $o_relacionadas = array_merge($this->request->data['Relacionada'], $this->request->data['Relacionada2']); ?>

        <h3>Imagens relacionadas</h3>
        <?php 
           foreach ($o_relacionadas as $relacionada): 
             echo $this->element('box_relacionada', array(
                       'relacionada' => $relacionada, 
                       'obra' => $this->request->data['Obra']));
           endforeach; 
        ?>
        <?php endif; ?>
      </div>
    </div>
  <!-- Fim step3 -->
</div>

<?php echo $this->Form->end(); ?>

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
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar Técnica', 
                                'form' => 'obratipo')); ?>
<?php echo $this->element('addmodal', 
                          array('titulo' => 'Relacionar Obra', 
                                'form' => 'relacionada')); ?>

<?php echo $this->element('addmodal', 
                          array('titulo' => 'Adicionar Artista', 
                                'form' => 'artista')); ?>

<?php echo $this->element('editmodal', 
                          array('titulo' => 'Editar Relacionamento', 
                                'form' => 'relacao')); ?>

<?php $this->Html->script("admin.js", array("inline" => false)); ?>
