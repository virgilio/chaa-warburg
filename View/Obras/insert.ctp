<?php 
   $this->Html->script("main.js", array("inline" => false));
   $this->Html->script("load-image.min.js", array("inline" => false));
   $this->Html->script("jquery.Jcrop.min.js", array("inline" => false));
   $this->Html->css('jquery.Jcrop.min.css', null, array("inline" => false));
?>

<div class="row">
  <div class="span5">
    <h2>Select an image file</h2>
    <p><input type="file" id="file-input"></p>
    <p><span class="label label-info">Notice</span> Or <strong>drag
        &amp; drop</strong> an image file onto this webpage.</p>
    <br>
    <div id="exif" style="display:none;">
      <h2>Exif meta data</h2>
      <div class="well" id="thumbnail" style="display:none;"></div>
      <table class="table table-striped" style="width:100%;
                                                word-wrap:break-word;
                                                table-layout:fixed;"></table>
    </div>
  </div>
  <div class="span7">
    <h2>Result</h2>
    <div id="result">
      
    </div>
  </div>
</div>
