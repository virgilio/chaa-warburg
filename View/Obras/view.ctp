<?php //pr(array_merge($obra['Relacionada'], $obra['Relacionada2'])); ?>
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
            <?php echo $obra['ObraTipo']['nome']; ?> |
            <?php echo h($obra['Obra']['ano_fim']); ?>
        </p>
        <p>
            <?php echo $obra['Instituicao']['nome']; ?> |
            <?php echo isset($obra['Instituicao']['Cidade']['nome'])?$obra['Instituicao']['Cidade']['nome']. ' - ' :'Local indefinido'; ?> 
            <?php echo isset($obra['Instituicao']['Cidade']['Pais']['nome'])?$obra['Instituicao']['Cidade']['Pais']['nome']:''; ?>
        </p>
        <p>
            <?php echo $this->Html->link('[DOWNLOAD DA OBRA]', '/img/obras/'.$obra['Obra']['imagem'], array('target' => 'blank')); ?>
        </p>
        <p class="obra_descricao">
            <?php echo ($obra['Obra']['descricao']); ?>
        </p>
    </div>

</div>


<div class="related">
    <?php if (!empty($obra['Relacionada']) || !empty($obra['Relacionada2'])): ?>
    <?php $relacionadas = array_merge($obra['Relacionada'], $obra['Relacionada2']); ?>
    <h3><?php echo __('Imagens Relacionadas'); ?></h3>
        <?php
            $i = 0;
            foreach ($relacionadas as $relacionada): ?>
            <div class="mini-obra-related <?php echo ($i%4 == 0) ? 'clear-miniobra':''; ?>">
                <a class="fancybox" href="#img_<?php echo $relacionada['id'] ?>" data-fancybox-group="gallery"><?php echo $this->Html->image('obras/'.$relacionada['imagem']); ?>
                </a>

                <div id="img_<?php echo $relacionada['id'] ?>" style="display: none;" class="modal_relacionadas">
                    <div class="obra">
                        <p><?php echo $this->Html->image(('obras/'.$obra['Obra']['imagem']), array('alt' => 'oie', 'border' => '0')); ?></p>
                        <p><?php echo $obra['Artista']['nome']; ?> (<?php echo h($obra['Obra']['ano_fim']); ?>)</p>
                        <p><?php echo $obra['Obra']['nome']; ?></p>
                    </div>
                    <div class="obra">
                        <?php echo $this->Html->image('obras/'.$relacionada['imagem']) ?>
                        <p><?php echo $relacionada['Artista']['nome']; ?> (<?php echo h($relacionada['ano_fim']); ?>)</p>
                        <p>
                            <?php echo $this->Html->link(
                            h(substr($relacionada['nome'], 0, 40)) . (strlen($relacionada['nome']) > 40 ? '...' : ''), 
                            array('controller' => 'obras', 'action' => 'view', $relacionada['id']), 
                            array('escape'=>false)); 
                            ?>
                        </p>
                    </div>
                </div>
             <p>
                <?php echo $this->Html->link(
                    h(substr($relacionada['nome'], 0, 40)) . (strlen($relacionada['nome']) > 40 ? '...' : ''), 
                    array('controller' => 'obras', 'action' => 'view', $relacionada['id']), 
                    array('escape'=>false)); 
                ?>
            </p>
            <p class="nome-artista">
                <?php echo $this->Html->link($relacionada['Artista']['nome'], array('controller' => 'artistas', 'action' => 'view', $relacionada['Artista']['id'])); ?>
                (<?php echo h($relacionada['ano_fim']); ?>)
            </p>
            </div>
        <?php $i++;
            endforeach; ?>
    <?php endif; ?>
</div>
