<?php 
   $this->Html->script("main.js", array("inline" => false));
   $this->Html->script("jquery.Jcrop.min.js", array("inline" => false));
   $this->Html->script("script.js", array("inline" => false));
   $this->Html->script("step-bar.js", array("inline" => false));
   $this->Html->css('jquery.Jcrop.min.css', null, array("inline" => false));
?>

<ul class="nav nav-tabs" id="step-bar">
  <li class="active"><a href="#" 
         data-toggle="tab">
      <i class="icon-picture"></i> Imagem <i class="icon-caret-right"></i>
    </a>
  </li>
  <li class="disabled"><a href="#" 
    
         data-toggle="tab">
      <i class="icon-file-text-alt"></i>
      Informações <i class="icon-caret-right"></i>
    </a>
  </li>
  <li class="disabled"><a href="#" 
         data-toggle="tab"><i class="icon-link"></i> Imagens relacionadas</a></li>
</ul>

<div class="bbody container insert-img">

  <!-- upload form -->
  <?php echo $this->Form->create('Obra', array('enctype' =>
  'multipart/form-data', 'action' => 'insert', 'onsubmit' => 'return checkForm()')); ?>
<!--  <form id="uploadForm" enctype="multipart/form-data" method="post"
        action="/warburg/obras/insert" onsubmit="return checkForm()">
    <!-- hidden crop params -->
    <?php echo $this->Form->input('nome', array('type' => 'textarea', 'class'=>'input-xxlarge','label' => 'Nome da imagem')); ?>
    <input type="hidden" id="x1" name="data[Thumbnail][x1]" />
    <input type="hidden" id="y1" name="data[Thumbnail][y1]" />
    <input type="hidden" id="x2" name="data[Thumbnail][x2]" />
    <input type="hidden" id="y2" name="data[Thumbnail][y2]" />

    <h4>Escolha a imagem para Upload</h4>
    <?php echo $this->Form->input('imagem', array('type' => 'file', 'id' =>
    'image_file', 'onchange' => 'fileSelectHandler()')); ?>

    <div class="error"></div>

    <div class="step2">
      <h4>Selecione o Thumbnailnail desejado</h4>
      <div class="container">
        <div class="span8 offset2">
          <img id="preview" />
        </div>
      </div>
      <input type="hidden" id="filesize" name="data[Thumbnail][filesize]" />
      <input type="hidden" id="filetype" name="data[Thumbnail][filetype]" />
      <input type="hidden" id="filedim" name="data[Thumbnail][filedim]" />
      <input type="hidden" id="w" name="data[Thumbnail][w]" />
      <input type="hidden" id="h" name="data[Thumbnail][h]" />
      
      <?php echo $this->Form->end(array('label' => 'Enviar', 'class' => 'btn')); ?>
    </div>
  </form>
</div>
