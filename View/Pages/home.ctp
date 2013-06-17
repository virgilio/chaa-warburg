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

<div id="myCarousel" class="carousel slide">
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>
  <!-- Carousel items -->
  <div class="carousel-inner">
    <div class="active item"><?php echo $this->Html->image('cabecalhos/cabecalho-01.jpg');?></div>
    <div class="item"><?php echo $this->Html->image('cabecalhos/cabecalho-02.jpg');?></div>
    <div class="item"><?php echo $this->Html->image('cabecalhos/cabecalho-03.jpg');?></div>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>