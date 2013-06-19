<?php 
   $this->Html->script("main.js", array("inline" => false));
   $this->Html->script("jquery.Jcrop.min.js", array("inline" => false));
   $this->Html->script("script.js", array("inline" => false));
   $this->Html->css('jquery.Jcrop.min.css', null, array("inline" => false));
?>

<div class="bbody">

  <!-- upload form -->
  <?php echo $this->Form->create('Obra', array('enctype' =>
  'multipart/form-data', 'action' => 'insert')); ?>
<!--  <form id="uploadForm" enctype="multipart/form-data" method="post"
        action="/warburg/obras/insert" onsubmit="return checkForm()">
    <!-- hidden crop params -->
    <?php echo $this->Form->input('nome'); ?>
    <input type="hidden" id="x1" name="data[Thumb][x1]" />
    <input type="hidden" id="y1" name="data[Thumb][y1]" />
    <input type="hidden" id="x2" name="data[Thumb][x2]" />
    <input type="hidden" id="y2" name="data[Thumb][y2]" />

    <h4>Escolha a imagem para Upload</h4>
    <?php echo $this->Form->input('imagem', array('type' => 'file', 'id' =>
    'image_file', 'onchange' => 'fileSelectHandler()')); ?>

    <div class="error"></div>

    <div class="step2">
      <h4>Selecione o Thumbnail desejado</h4>
      <div class="container">
        <div class="span8 offset2">
          <img id="preview" />
        </div>
      </div>
      <input type="hidden" id="filesize" name="data[Thumb][filesize]" />
      <input type="hidden" id="filetype" name="data[Thumb][filetype]" />
      <input type="hidden" id="filedim" name="data[Thumb][filedim]" />
      <input type="hidden" id="w" name="data[Thumb][w]" />
      <input type="hidden" id="h" name="data[Thumb][h]" />
      
      <?php echo $this->Form->end('Enviar'); ?>
    </div>
  </form>
</div>