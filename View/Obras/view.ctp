<?php echo $this->element('buscas'); ?>
<h1>Detalhes da obra</h1>

<div class="obra_container">
    <div class="img_obra">
        <?php echo $this->Html->link($this->Html->image('obras/'.$obra['Obra']['imagem']), '/img/obras/'.$obra['Obra']['imagem'], array('class' => 'sxyzoom swinxylens','escape'=>false)); 
        ?>
    </div>
    <div class="info_obra">
        <h2 class="nome_obra"><?php echo h($obra['Obra']['nome']); ?></h2>
        <p class="nome_artista">
            <?php echo $this->Html->link($obra['Artista']['nome'], array('controller' => 'artistas', 'action' => 'view', $obra['Artista']['id'])); ?>
        </p>
        <p>
            <?php echo($obra['ObraTipo']['nome']) ? $obra['ObraTipo']['nome'] . ' |' : ''; ?>
            <?php 
              if(h($obra['Obra']['incerta']) == 1) {
                echo '(data incerta)';
              } elseif (($obra['Obra']['ano_inicio'] == null) && ($obra['Obra']['ano_fim'] == null)) {
                echo '(sem data)';
              } else {
                echo '(';
                echo (h($obra['Obra']['ante_post_quam']) == 0) ? 'ante quam ' : ''; 
                echo (h($obra['Obra']['ante_post_quam']) == 1) ? 'post quam ' : ''; 
                echo (h($obra['Obra']['circa']) == 1) ? 'circa ' : ''; 
                echo (h($obra['Obra']['ano_inicio']) != 0) ? h($obra['Obra']['ano_inicio']) . ' - ': ''; 
                echo h($obra['Obra']['ano_fim']); 
                echo ')';
              }             
            ?>
        </p>
        <p>
            <?php echo ($obra['Instituicao']['nome']) ? $obra['Instituicao']['nome'] . ' |' : ''; ?>
            <?php echo isset($obra['Instituicao']['Cidade']['nome'])?$obra['Instituicao']['Cidade']['nome']. ' - ' :'Local indefinido'; ?> 
            <?php echo isset($obra['Instituicao']['Cidade']['Pais']['nome'])?$obra['Instituicao']['Cidade']['Pais']['nome']:''; ?>
        </p>
        <p>
            <?php echo $this->Html->link('[DOWNLOAD DA OBRA]', '/img/obras/'.$obra['Obra']['imagem'], array('target' => 'blank')); ?>
        </p>
        <p>
          <?php 
            $murl = $this->Session->read('SearchQuery');
            echo $this->Html->link('[VOLTAR PARA A PESQUISA INICIAL]', 
                                   '/obras/search/' . $murl,
                                   array('escape' => false)); 
          ?>
        </p>
        <p class="obra_descricao">
            <?php echo ($obra['Obra']['descricao']); ?>
        </p>
    </div>

</div>


<div class="related">
  <?php $i = 0;
        if (!empty($relacionadas)): ?>
    <h3><?php echo __('Imagens Relacionadas'); ?></h3>
    <?php foreach ($relacionadas as $relacionada):         ?>
    <?php 
       $user = $relacionada['User'];
       $relacao = $relacionada['ObrasRelacionada'];
       if($relacionada['ObrasRelacionada']['obra_id'] == $obra['Obra']['id']){
         $relacionada = $relacionada['Relacionada'];
       } else {
         $relacionada = $relacionada['Obra'];
       }
       ?>
    <div class="mini-obra-related <?php echo ($i%4 == 0) ? 'clear-miniobra':''; ?>">
      <a class="fancybox tooltip-helper" 
         href="#img_<?php echo $relacionada['id'] ?>" 
         data-toggle="tootip"
         title="Clique para comparar imagens"
         data-fancybox-group="gallery">
        <?php echo $this->Html->image('obras/'.$relacionada['imagem']); ?>
      </a>
      
      <div id="img_<?php echo $relacionada['id'] ?>" style="display: none;" class="modal_relacionadas">
        <div class="obra">
          <div class="modal-img">
            <?php echo $this->Html->image(('obras/'.$obra['Obra']['imagem']),
          array('alt' => '', 'border' => '0',)); ?>
          </div>
          <p><?php echo $obra['Artista']['nome']; ?>
            (<?php 
            if (($obra['Obra']['ano_inicio'] == null) && ($obra['Obra']['ano_fim'] == null)) {
                echo 'sem data';
              } else {
                echo (h($obra['Obra']['ano_inicio']) != 0) ? h($obra['Obra']['ano_inicio']) . ' - ': ''; 
                echo h($obra['Obra']['ano_fim']); 
            };             
            ?>)
          </p>
          <p><?php echo $obra['Obra']['nome']; ?></p>
        </div>
        <div class="obra">
          <div class="modal-img">
            <?php echo $this->Html->image('obras/'.$relacionada['imagem']) ?>
          </div>
          <p><?php echo $relacionada['Artista']['nome']; ?>
            (<?php 
            if (($relacionada['ano_inicio'] == null) && ($relacionada['ano_fim'] == null)) {
                echo 'sem data';
              } else {
                echo (h($relacionada['ano_inicio']) != 0) ? h($relacionada['ano_inicio']) . ' - ': ''; 
                echo h($relacionada['ano_fim']); 
            };             
            ?>)
          </p>
          <p>
            <?php echo $this->Html->link(
            h(substr($relacionada['nome'], 0, 40)) . (strlen($relacionada['nome']) > 40 ? '...' : ''), 
            array('controller' => 'obras', 'action' => 'view', $relacionada['id']), 
            array('escape'=>false)); 
            ?>
          </p>
          <div class="clearfix relacionado-por" style="">
            <h5> Relação proposta por: 
              <?php echo $user['nome']; ?>
            </h5>
            <p>
              <?php echo $relacao['descricao']; ?>
            </p>
          </div>
          
        </div>
      </div>
      <p>
        <?php echo $this->Html->link(
        h(substr($relacionada['nome'], 0, 40)) . (strlen($relacionada['nome']) > 40 ? '...' : ''), 
        array('controller' => 'obras', 'action' => 'view', $relacionada['id']), 
        array('escape' => false, 'class' => 'tooltip-helper', 
              'title' => ('Ir para imagem <span>' . $relacionada['nome'] . '</span>'),
              'data-placement' => 'bottom', 'data-toggle' => 'tooltip', 
              'target' => '_blank')); 
        ?>
      </p>
      <p class="nome-artista">
        <?php echo $this->Html->link($relacionada['Artista']['nome'],
        array('controller' => 'artistas', 'action' => 'view',
        $relacionada['Artista']['id']), 
        array('escape' => false,
              'title' => ('Ir para perfil do autor'),
              'target' => '_blank')); ?>
        (<?php 
        if (($relacionada['ano_inicio'] == null) && ($relacionada['ano_fim'] == null)) {
            echo 'sem data';
          } else {
            echo (h($relacionada['ano_inicio']) != 0) ? h($relacionada['ano_inicio']) . ' - ': ''; 
            echo h($relacionada['ano_fim']); 
        };             
        ?>)
      </p>
    </div>
    <?php $i++;
          endforeach; ?>
    <?php endif; ?>
</div>
