<div class="obras form">
<?php echo $this->Form->create('Obra', array('class' => 'form-horizontal')); ?>
	<fieldset>
		<legend><?php echo __('Adicionar obra'); ?></legend>
	<div class="pull-left">
		<?php echo $this->Form->input('id'); ?>
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
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Obras'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Obra Tipos'), array('controller' => 'obra_tipos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Obra Tipo'), array('controller' => 'obra_tipos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Instituicoes'), array('controller' => 'instituicoes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Instituicao'), array('controller' => 'instituicoes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Paises'), array('controller' => 'paises', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Pais'), array('controller' => 'paises', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Cidades'), array('controller' => 'cidades', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Cidade'), array('controller' => 'cidades', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Artistas'), array('controller' => 'artistas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Artista'), array('controller' => 'artistas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Iconografias'), array('controller' => 'iconografias', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Iconografia'), array('controller' => 'iconografias', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Obras'), array('controller' => 'obras', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Relacionada'), array('controller' => 'obras', 'action' => 'add')); ?> </li>
	</ul>
</div>
