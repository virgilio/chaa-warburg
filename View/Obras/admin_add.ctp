<div class="obras form">

    <ul class="nav nav-tabs" id="step-bar">
      <li><a href="#home" data-toggle="tab"><i class="icon-picture"></i> Imagem <i class="icon-caret-right"></i></a></li>
      <li><a href="#profile" class="disabled" data-toggle="tab"><i class="icon-file-text-alt"></i> Informações <i class="icon-caret-right"></i></a></li>
      <li><a href="#messages"class="disabled" data-toggle="tab"><i class="icon-link"></i> Imagens relacionadas</a></li>
    </ul>
<?php echo $this->Form->create('Obra', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar obra'); ?></legend>   
   
	<div class="pull-left">
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
		<div class="control-group">
		  <label class="control-label" for="imagem">Imagem</label>
		  <div class="controls">
		    <?php echo $this->Form->input('imagem', array('label' => '')); ?>		    
		  </div>
		</div>
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
		  <label class="control-label" for="aproximado">Aproximado</label>
		  <div class="controls">
		    <?php echo $this->Form->input('aproximado', array('label' => '')); ?>		    
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
	    <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn btn-primary')); ?>
	  </div>
	</div>
</div>