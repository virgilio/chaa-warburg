<?php 
  $search_type = isset($this->request->query['Search']['type']) ?
    $this->request->query['Search']['type'] : 'fast'; 
  
  $this->Html->css('bootstrapSwitch.css', null, array('inline' =>
                                                      false)); 
  $this->Html->script('bootstrapSwitch.min.js', array('inline' => false));
  $this->Html->script('buscas.js', array('inline' => false));
?>
<div class="buscas" id="tabs">
  <ul class="nav nav-tabs" id="tab_buscas">
    <li class="<?php echo $search_type === 'fast' ? 'active' : '' ?>">
      <a href="#busca_rapida">Busca rápida</a>
    </li>
    <li class="<?php echo $search_type === 'advanced' ? 'active' : '' ?>">
      <a href="#busca_avancada">Busca avançada</a>
    </li>
  </ul>
  
  <div class="tab-content">             
    <div class="tab-pane 
                <?php 
                  echo $search_type === 'fast' ? 'active' : '' 
                ?>"
                id="busca_rapida">
      <?php
        echo $this->Form->create(false, array(
            'url' => array('controller' => 'obras', 'action' => 'search'),
            'type' => 'get',
            'class' => 'form-horizontal'
        ));
      ?>
      <fieldset>
        <!-- Text input-->
        <div class="control-group">
          <label class="control-label" for="busca">Buscar</label>
          <div class="controls">
            <input type="hidden" name="Search[type]" value="fast" /> 
            <!--<input id="busca" name="Search[query]" 
                   type="text" placeholder=""
                   class="input-large pull-left">-->
            <?php 
              $query_data = "";
              if(isset($data['Search']['query']))
                $query_data = $data['Search']['query'];
              
              echo $this->Form->input('Search[query]', 
                                      array(
                                        'label' => false, 
                                        'id' => 'busca',
                                        'class' => 'input-large pull-left',
                                        'value' => $query_data,
                                        'div' => false,
                                      )
              ); 
              echo $this->Form->end(array(
                'label' => 'Buscar', 
                'id' => 'singlebutton',
                'class' => 'btn btn-default pull-left')); 
            ?>
          </div>
        </div>
      </fieldset>
      <?php echo $this->Form->end(); ?>
    </div>
    <div class="tab-pane 
                <?php 
                  echo $search_type === 'advanced' ? 'active' : '' 
                ?>" 
                id="busca_avancada">
      <?php
        echo $this->Form->create(false, array(
            'url' => array('controller' => 'obras', 'action' => 'search'),
            'type' => 'get',
            'class' => 'form-horizontal'
        ));
        $hasValues = isset($data['Search']) && 'advanced' === $data['Search']['type'];
      ?>
      <input type="hidden" name="Search[type]" value="advanced" /> 
      <fieldset>
        <!-- Text input-->
        <div class="pull-left">
          <div class="control-group">
            <label class="control-label" for="artista">Artista</label>
            <div class="controls">
              <input id="artista" 
                     data-provide="typeahead" 
                     data-source='<?php echo h($artistas_list); ?>' 
                     autocomplete="off"
                     value="<?php 
                              echo $hasValues ? $data['Search']['artista'] :  
                              '';
                            ?>"
                     name="Search[artista]" 
                     type="text" 
                     placeholder="" 
                     class="input-large">
            </div>
          </div>
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="obra">Obra</label>
            <div class="controls">
              <input id="obra" 
                     name="Search[obra]" 
                     value="<?php 
                       echo $hasValues 
                       ? $data['Search']['obra'] 
                       : ""; ?>"
                     type="text" 
                     placeholder="" class="input-large">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" 
                   for="instituicao">Instituição da obra</label>
            <div class="controls">
              <input id="instituicao" 
                     data-provide="typeahead" 
                     autocomplete="off"
                     value="<?php echo $hasValues ?
                       $data['Search']['instituicao'] : ""; ?>"
                     data-source='<?php echo h($instituicoes_list); ?>' 
                     name="Search[instituicao]" 
                     type="text" 
                     placeholder="" 
                     class="input-large">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="pais">País</label>
            <div class="controls">
              <input id="pais" 
                     data-provide="typeahead" 
                     autocomplete="off"
                     value="<?php echo $hasValues ? 
                       $data['Search']['pais'] : ""; ?>"
                     data-source='<?php echo h($paises_list); ?>' 
                     name="Search[pais]" 
                     type="text" 
                     placeholder="" 
                     class="input-large">
            </div>
          </div>
          
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="cidade">Cidade</label>
            <div class="controls">
              <input id="cidade" 
                     data-provide="typeahead" 
                     autocomplete="off"
                     value="<?php echo $hasValues ? 
                       $data['Search']['cidade'] : ""; ?>"
                     data-source='<?php echo h($cidades_list); ?>' 
                     name="Search[cidade]" 
                     type="text" 
                     placeholder="" 
                     class="input-large">
            </div>
          </div>
        </div>
        <div class="pull-left">
          <!-- Text input-->
          <div class="control-group">
            <label class="control-label" for="tags">Palavras-chave</label>
            <div class="controls">
              <input id="tags" 
                     name="Search[tags]" 
                     value="<?php echo $hasValues ? 
                       $data['Search']['tags'] : ""; ?>"
                     type="text" 
                     placeholder="" 
                     class="input-large">
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tags">Técnica</label>
            <div class="controls">
              <?php 
                echo $this->Form->input(
                  'ObraTipo',
                  array('empty' => '', 
                        'label' => false, 
                        'class' => 'input_chosena',
                        'data-placeholder' => 'Selecione a técnica da obra', 
                        'value' =>
                        (isset($data['ObraTipo']) 
                         ? $data['ObraTipo'] 
                         : ""))); 
              ?>
            </div>
          </div>
          <div class="control-group">
            <label class="control-label" for="tags">Iconografia</label>
            <div class="controls">
              <?php 
                echo $this->Form->input(
                  'Iconografia', 
                  array('empty' => '', 
                        'label' => false, 
                        'class' => 'input_chosena',
                        'data-placeholder' => 'Selecione a iconografia', 
                        'data-provide' => 'typeahead', 
                        'value' => (isset($data['Iconografia']) 
                                    ? $data['Iconografia'] 
                                    : ""))); 
              ?>
            </div>
          </div>

          <div class="control-group">
            <label class="control-label" for="cidade">Ano</label>
            <div class="controls">
              <input id="ano" 
                     value="<?php echo $hasValues 
                       ? $data['Search']['ano'] : ""; ?>"
                     name="Search[ano]" 
                     type="text" placeholder="" 
                     class="input-large">
            </div>
          </div>
          <h5 class="span4 pull-right">Obras sem data</h5>
          <div class="control-group">
            <label class="control-label" for="option1">
              Mostrar sem data
            </label>
            <div class="controls">
              <div id="option1" class="make-switch showsemdata" 
                   data-on="success" 
                   data-off="danger" 
                   data-on-label="<i class='icon-ok icon-white'></i>" 
                   data-off-label="<i class='icon-remove'></i>">
                <input 
                   type="radio" name="Search[semdata]"
                   id="SemData1" value="1" 
                   <?php 
                       if(isset($data['Search']['semdata'])){
                         echo $data['Search']['semdata'] == 1
                         ? "checked" 
                         : ""; 
                       } else if (!isset($data['Search'])) { //No search at all
                           echo "checked";
                       }
                      ?>    
                   />
              </div>
            </div>
            <label class="control-label" for="option2">
              Apenas sem data
            </label>
            <div class="controls"> 
              <div id="option2" class="make-switch showsemdata" 
                   data-on="success" 
                   data-off="danger" 
                   data-on-label="<i class='icon-ok icon-white'></i>" 
                   data-off-label="<i class='icon-remove'></i>">
                <input 
                   type="radio" name="Search[semdata]" 
                   id="SemData0" value="0"
                   <?php 
                       if(isset($data['Search']['semdata'])){
                         echo $data['Search']['semdata'] == 0 
                         ? "checked" 
                         : ""; 
                       }
                   ?>    
                   />
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="span12" style="margin-bottom: 20px;">
            <label class="control-label" for="cidade">Intervalo</label>
            <div class="controls">
              <span>
                <input id="int-inicio" name="Search[inicio]" type="text"
                       value="<?php echo $ano_min; ?>" class="input-mini search-query" />
                <input id="int-fim" name="Search[fim]" type="text"
                       value="<?php echo $ano_max; ?>" class="input-mini
                                                              search-query" />
              </span>
              <input id="intervalo" 
                     type="text"
                     value="<?php echo $hasValues ? $data['Search']['intervalo'] : ""; ?>"
                     name="Search[intervalo]" type="text" 
                     style="border: 0; width: auto;"
                     />
              <?php 
                 $tosign = $ano_min . ',' . $ano_max . ',';
                   if($hasValues){
                     $tosign .= (!empty($data['Search']['inicio']) ?
                       $data['Search']['inicio'] : $ano_min)  . ',';
                     $tosign .= (!empty($data['Search']['fim']) ? $data['Search']['fim']
                       : $ano_min);
                   } else {
                     $tosign .= $ano_min . ',' .  $ano_max;
                   }
                 ?>
            </div>
          </div>
          <div id="slider-range" class="span10 offset1 clearfix" 
               style="margin-bottom:  20px;"></div>
        </div>
        <!-- Button -->
        <div class="control-group offset7 clearfix">
          <label class="control-label" for="singlebutton"></label>
          <div class="controls">
            <?php echo $this->Form->end(array('label' => 'Buscar', 'id' => 'singlebutton',
	    'class' => 'btn btn-default')); ?>
          </div>
        </div>
      </fieldset>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
</div>
<?php if($this->request->params['controller'] == 'obras'
          && ('search' == $this->request->params['action']
              || 'index' == $this->request->params['action'])) { ?>
<div class="container">
  <div class="row-fluid">
    <div class="span10 offset1">
      <ul class="unstyled inline">
        <?php foreach($letters as $letter){ ?>
        <li>
          <?php echo $this->Html->link(strtoupper($letter), 
          array_merge(
            array($letter, 
                  '?' => (!empty($this->request->query) ? $this->request->query : '')),
            $this->request->named));
          ?>
        </li>  
        <?php }?>
        <li>
          <?php echo $this->Html->link(('<i class="icon-repeat"></i>'), 
                       array('', 
                         '?' => (!empty($this->request->query) ?
                                 $this->request->query : '')), 
                       array('escape' => false)); ?>
        </li>
      </ul>
    </div>
  </div>
</div>
<?php } ?>
<script type="text/javascript">
  loadslider(<?php echo $tosign; ?>);
</script>
