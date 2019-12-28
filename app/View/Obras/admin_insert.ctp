<?php 
    $this->Html->script("main.js", array("inline" => false));
    //$this->Html->script("jquery.Jcrop.min.js", array("inline" => false));
    //$this->Html->script("script.js", array("inline" => false));
    $this->Html->script("image_handler.js", array("inline" => false));
    //$this->Html->script("step-bar.js", array("inline" => false));
    //$this->Html->css('jquery.Jcrop.min.css', null, array("inline" => false));
    $this->Html->script("nicedit/nicEdit.js", array("inline" => false));
?>

<div class="bbody container-fluid insert-img">
    <ul class="nav nav-tabs" id="step-bar">
        <li class="active">
            <a href="#edit-img-step1">
               <i class="icon-picture"></i> Imagem 
            </a>
        </li>
        <li class="disabled">
            <a href="#">
                <i class="icon-file-text-alt"></i> Informações 
            </a>
        </li>
        <li class="disabled">
            <a href="#">
                <i class="icon-link"></i> Imagens relacionadas
            </a>
        </li>
    </ul>
<!-- upload form -->
<?php
    echo $this->Form->create(false, array(
        'enctype' =>'multipart/form-data',
        'url' => array('controller' => 'obras', 'action' => 'insert'),
        'onsubmit' => 'return ImageHandler.checkForm()'
    ));
?>
<?php
    echo $this->Form->submit('Enviar', array('class' =>
        'btn btn-large btn-success pull-right'));
?>

    <div class="row-fluid">
    <!-- hidden crop params -->
<?php 
    echo $this->Form->input(
        'nome', 
        array(
            'type' => 'textarea', 
            'class'=>'input-xxlarge',
            'rows' => 2,
            'label' => 'Nome da imagem')); ?>

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
        <h4>Escolha a imagem para Upload</h4>
<?php 
    echo $this->Form->input('imagem', 
        array('type' => 'file', 
            'id' =>   'image_file', 
            'onchange' => 'ImageHandler.fileSelectHandler()')); 
?>

        <div class="error"></div>
    </div>
    <div class="row-fluid">
        <div class="span6" style="height: auto">
            <div class="jcrop" id="image-box">            
<?php 
    echo $this->Html->image(
        'semthumb.jpg', 
        array('id' => 'preview', 
            'class' => 'img-polaroid'));?>
            </div>
        </div>
        <input type="hidden" id="filesize" name="data[Thumbnail][filesize]" />
        <input type="hidden" id="filetype" name="data[Thumbnail][filetype]" />
        <input type="hidden" id="filedim" name="data[Thumbnail][filedim]" />
    </div>
</div>
<?php echo $this->Form->end(); ?>
<?php 
    echo $this->element('addmodal', 
        array('titulo' => 'Adicionar Artista', 
            'form' => 'artista')); ?>

<?php $this->Html->script("admin_insert.js", array("inline" => false)); ?>
