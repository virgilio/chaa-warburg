<div class="buscas">

    <ul class="nav nav-tabs" id="tab_buscas">
      <li class="active"><a href="#busca_rapida">Busca rápida</a></li>
      <li><a href="#busca_avancada">Busca avançada</a></li>
    </ul>
     
    <div class="tab-content">
      <div class="tab-pane active" id="busca_rapida">
        <form class="form-horizontal">
            <fieldset>
            <!-- Text input-->
            <div class="control-group">
              <label class="control-label" for="busca">Buscar</label>
              <div class="controls">
                <input id="busca" name="busca" type="text" placeholder="" class="input-large">
                <button id="singlebutton" name="singlebutton" class="btn btn-default">Buscar</button>
              </div>
            </div>

            </fieldset>
        </form>


      </div>
      <div class="tab-pane" id="busca_avancada">
        <form class="form-horizontal">
        <fieldset>
            <!-- Text input-->
            <div class="pull-left">
                <div class="control-group">
                  <label class="control-label" for="artista">Artista</label>
                  <div class="controls">
                    <input id="artista" name="artista" type="text" placeholder="" class="input-large">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="obra">Obra</label>
                  <div class="controls">
                    <input id="obra" name="obra" type="text" placeholder="" class="input-large">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="instituicao">Instituição da obra</label>
                  <div class="controls">
                    <input id="instituicao" name="instituicao" type="text" placeholder="" class="input-large">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="pais">País</label>
                  <div class="controls">
                    <input id="pais" name="pais" type="text" placeholder="" class="input-large">
                    
                  </div>
                </div>

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="cidade">Cidade</label>
                  <div class="controls">
                    <input id="cidade" name="cidade" type="text" placeholder="" class="input-large">
                    
                  </div>
                </div>
            </div>
            <div class="pull-left">

                <!-- Text input-->
                <div class="control-group">
                  <label class="control-label" for="tags">Palavras-chave</label>
                  <div class="controls">
                    <input id="tags" name="tags" type="text" placeholder="" class="input-large">
                    
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="tags">Tipo de obra</label>
                  <div class="controls">
                    <?php echo $this->Form->input('obra_tipos_id',
                                array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione o tipo de obra')); ?>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label" for="tags">Iconografia</label>
                  <div class="controls">
                    <?php echo $this->Form->input('iconografia_id', 
                                array('label' => '', 'class' => 'input_chosen', 'data-placeholder' => 'Selecione a iconografia')); ?>
                  </div>
                </div>

                <!-- Button -->
                <div class="control-group">
                  <label class="control-label" for="singlebutton"></label>
                  <div class="controls">
                    <button id="singlebutton" name="singlebutton" class="btn btn-default">Buscar</button>
                  </div>
                </div>
            </div>

        </fieldset>
        </form>

      </div>
    </div>

</div>

<div class="obras index">
    <h1><?php echo __('Lista de obras'); ?></h1>
    <?php foreach ($obras as $obra): ?>
        <div class="mini-obra">
            <?php 
               echo $this->Html->link(
                      $this->Html->image(('obras/thumbs/' . $obra['Obra']['imagem']), 
                        array('alt' => $obra['Obra']['imagem'], 'border' => '0')), 
                        array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), 
                        array('escape'=>false)); 
/*echo $this->Html->link($this->Html->image(('obras/'.$obra['Obra']['id'].'_thumb.jpg'), array('alt' => 'oie', 'border' => '0')), array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), array('escape'=>false));*/ ?>
            <p>
                <?php echo $this->Html->link(
                    h(substr($obra['Obra']['nome'], 0, 40)) . (strlen($obra['Obra']['nome']) > 40 ? '...' : ''), 
                    array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), 
                    array('escape'=>false)); 
                ?>
            </p>
            <p class="nome-artista">
                <?php echo $this->Html->link($obra['Artista']['nome'], array('controller' => 'artistas', 'action' => 'view', $obra['Artista']['id'])); ?>
                (<?php echo h($obra['Obra']['ano_fim']); ?>)
            </p>
            
        </div>
    <?php endforeach; ?>
    
    <div class="paging">
        <p>
            <?php
            echo $this->Paginator->counter(array(
            'format' => __('Página {:page} de {:pages}, mostrando {:current} obras de {:count}')
            ));
            ?>  
        </p>
        <p>
            <?php
                echo $this->Paginator->prev('< ' . __('Anterior'), array(), null, array('class' => 'prev disabled'));
                echo $this->Paginator->numbers(array('separator' => ''));
                echo $this->Paginator->next(__('Próxima') . ' >', array(), null, array('class' => 'next disabled'));
            ?>
        </p>
    </div>
</div>
