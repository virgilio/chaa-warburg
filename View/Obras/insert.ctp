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
    <input type="hidden" id="x1" name="x1" />
    <input type="hidden" id="y1" name="y1" />
    <input type="hidden" id="x2" name="x2" />
    <input type="hidden" id="y2" name="y2" />

    <h2>Step1: Please select image file</h2>
    <div><input type="file" name="imagefile" id="image_file"
                onchange="fileSelectHandler()" /></div>

    <div class="error"></div>

    <div class="step2">
      <h2>Step2: Please select a crop region</h2>
      <img id="preview" />

      <div class="info">
        <label>File size</label> <input type="text" id="filesize"
                                        name="filesize" />
        <label>Type</label> <input type="text" id="filetype"
                                   name="filetype" />
        <label>Image dimension</label> <input type="text" id="filedim"
                                              name="filedim" />
        <label>W</label> <input type="text" id="w" name="w" />
        <label>H</label> <input type="text" id="h" name="h" />
      </div>

      <input type="submit" value="Upload" />
    </div>
  </form>
</div>
