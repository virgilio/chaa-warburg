<?php $search_type = isset($this->request->query['Search']['type']) ?
$this->request->query['Search']['type'] : 'fast'; ?>
<div class="buscas" id="tabs">
  <ul class="nav nav-tabs" id="tab_buscas">
    <li class="<?php echo $search_type === 'fast' ? 'active' : '' ?>"><a href="#busca_rapida">Busca rápida</a></li>
    <li class="<?php echo $search_type === 'advanced' ? 'active' : '' ?>"><a href="#busca_avancada">Busca avançada</a></li>
  </ul>
  
  <div class="tab-content">             
    <div class="tab-pane <?php echo $search_type === 'fast' ? 'active' : '' ?>" id="busca_rapida">
      <?php 
         echo $this->Form->create('Obra', array('action' => 'search', 'type' => 'get', 'class' => 'form-horizontal')); ?>
      <fieldset>
        <!-- Text input-->
        <div class="control-group">
          <label class="control-label" for="busca">Buscar</label>
          <div class="controls">
            <input type="hidden" name="Search[type]" value="fast" /> 
            <input id="busca" name="Search[query]" type="text" placeholder=""
                   class="input-large">
	    <?php echo $this->Form->end(array('label' => 'Buscar', 'id' => 'singlebutton',
	    'class' => 'btn btn-default')); ?>
          </div>
        </div>
      </fieldset>
      <?php echo $this->Form->end(); ?>
    </div>
    <div class="tab-pane <?php echo $search_type === 'advanced' ? 'active' : '' ?>" id="busca_avancada">
      <?php echo $this->Form->create('Obra', array('action' => 'search', 'type'
      => 'get', 'class' => 'form-horizontal')); ?>
      <input type="hidden" name="Search[type]" value="advanced" /> 
      <fieldset>
        <!-- Text input-->
        <div class="pull-left">
          <div class="control-group">
            <label class="control-label" for="artista">Artista</label>
            <div class="controls">
              <input id="artista" name="Search[artista]" type="text" placeholder="" class="input-large">
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="obra">Obra</label>
            <div class="controls">
              <input id="obra" name="Search[obra]" type="text" placeholder="" class="input-large">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="instituicao">Instituição da obra</label>
            <div class="controls">
              <input id="instituicao" name="Search[instituicao]" type="text" placeholder="" class="input-large">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="pais">País</label>
            <div class="controls">
              <input id="pais" name="Search[pais]" type="text" placeholder="" class="input-large">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="cidade">Cidade</label>
            <div class="controls">
              <input id="cidade" name="Search[cidade]" type="text" placeholder="" class="input-large">
            </div>
          </div>
        </div>
        <div class="pull-left">
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="tags">Palavras-chave</label>
            <div class="controls">
              <input id="tags" name="Search[tags]" type="text" placeholder="" class="input-large">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tags">Tipo de obra</label>
            <div class="controls">
              <?php echo $this->Form->input('ObraTipo',
              array('empty' => '', 'label' => '', 'class' => 'input_chosena',
              'data-placeholder' => 'Selecione o tipo de obra')); ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tags">Iconografia</label>
            <div class="controls">
              <?php echo $this->Form->input('Iconografia', 
              array('empty' => '', 'label' => '', 'class' => 'input_chosena',
              'data-placeholder' => 'Selecione a iconografia')); ?>
            </div>
          </div>
          
          <!-- Button -->
          <div class="control-group">
            <label class="control-label" for="singlebutton"></label>
            <div class="controls">
              <?php echo $this->Form->end(array('label' => 'Buscar', 'id' => 'singlebutton',
	      'class' => 'btn btn-default')); ?>
            </div>
          </div>
        </div>          
      </fieldset>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
