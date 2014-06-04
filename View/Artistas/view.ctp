<?php echo $this->element('buscas'); ?>
<div class="artistas view">
	<h2><?php echo h($artista['Artista']['nome']); ?></h2>
	<div class="img_artista">
          <?php echo $this->Html->image('artistas/'.(empty($artista['Artista']['imagem']) ? 'semthumb.jpg' : $artista['Artista']['imagem']), 
            array('onerror' => "this.src = '" . $this->webroot . "img/semthumb.jpg';")); 
        ?>
	</div>
	<div class="desc_artista">
		<?php echo $artista['Artista']['biografia']; ?>
	</div>
</div>

<div class="related">
	<?php if (!empty($artista['Obra'])): ?>
    <h3><?php echo __('Obras do artista'); ?> <small>(<?php echo count($artista['Obra'])?> obras cadastradas)</small></h3>
    
	<?php
		$i = 0;
		foreach ($artista['Obra'] as $obra): ?>
		<div class="mini-obra">
		  <a class="fancybox" 
                     href="#img_<?php echo $obra['id'] ?>" 
                     data-fancybox-group="gallery">
                    <?php echo $this->Html->image('obras/thumbs/' . $obra['imagem']); ?>
                  </a>

            <div id="img_<?php echo $obra['id'] ?>" style="display: none;" class="modal_obra">
                <div>
                    <p><?php echo $this->Html->image(('obras/'.$obra['imagem']), array('alt' => '', 'border' => '0')); ?></p>
                    <p><?php echo $artista['Artista']['nome']; ?>
                    (<?php 
                        if (($obra['ano_inicio'] == null) && ($obra['ano_fim'] == null)) {
                            echo 'sem data';
                          } else {
                            echo (h($obra['ano_inicio']) != 0) ? h($obra['ano_inicio']) . ' - ': ''; 
                            echo h($obra['ano_fim']); 
                        };             
                    ?>)
                    </p>
                    <p><?php echo $obra['nome']; ?></p>
                </div>
            </div>
            <p>
                <?php echo $this->Html->link(
                    h(substr($obra['nome'], 0, 40)) . (strlen($obra['nome']) > 40 ? '...' : ''), 
                    array('controller' => 'obras', 'action' => 'view', $obra['id']), 
                    array('escape'=>false)); 
                ?>
            </p>
            <p class="nome-artista">
                (<?php 
                    if (($obra['ano_inicio'] == null) && ($obra['ano_fim'] == null)) {
                        echo 'sem data';
                      } else {
                        echo (h($obra['ano_inicio']) != 0) ? h($obra['ano_inicio']) . ' - ': ''; 
                        echo h($obra['ano_fim']); 
                    };             
                ?>)
            </p>
        </div>
	<?php endforeach; ?>
<?php endif; ?>
</div>
