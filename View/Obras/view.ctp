<h1>Detalhes da obra</h1>

<div class="obra_container">
    <div class="img_obra">
        <?php echo $this->Html->link($this->Html->image(('obras/'.$obra['Obra']['imagem']), array('alt' => 'oie', 'border' => '0')), array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), array('escape'=>false)); ?>
    </div>
    <div class="info_obra">
        <h2 class="nome_obra"><?php echo h($obra['Obra']['nome']); ?></h2>
        
        <?php echo $this->Html->link($obra['Artista']['nome'], array('controller' => 'artistas', 'action' => 'view', $obra['Artista']['id'])); ?>

        <?php echo $this->Html->link($obra['ObraTipo']['nome'], array('controller' => 'obra_tipos', 'action' => 'view', $obra['ObraTipo']['id'])); ?> |
        <?php echo h($obra['Obra']['ano_fim']); ?>
        [download]

        [voltar para a pesquisa]

        <?php echo h($obra['Obra']['descricao']); ?>
    </div>


</div>


<div class="related">
    <h3><?php echo __('Obras Relacionadas'); ?></h3>
    <?php if (!empty($obra['Relacionada'])): ?>
        <?php
            $i = 0;
            foreach ($obra['Relacionada'] as $relacionada): ?>
            <div class="mini-obra">
                <?php echo $this->Html->image('obras/'.$relacionada['id'].'_thumb.jpg') ?>
             <p>
                <?php echo $this->Html->link(
                    h(substr($relacionada['nome'], 0, 40)) . (strlen($relacionada['nome']) > 40 ? '...' : ''), 
                    array('controller' => 'obras', 'action' => 'view', $relacionada['id']), 
                    array('escape'=>false)); 
                ?>
            </p>
            <p class="nome-artista">
                <?php echo $this->Html->link($relacionada['artista_id']['nome'], array('controller' => 'artistas', 'action' => 'view', $relacionada['artista_id'])); ?>
                (<?php echo h($relacionada['ano_fim']); ?>)
            </p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
