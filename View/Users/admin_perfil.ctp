<div class="users form container">
  <div class="row-fluid">
    <div class="span6">
      <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
      <fieldset>
        <legend><?php echo __('Editar conta'); ?></legend>
        <?php echo $this->Form->input('id');?>
        <div class="control-group">
          <label class="control-label" for="nome">Nome</label>
          <div class="controls">
	    <?php 
               echo $this->Form->input('nome', array('label' => '', 'style' => 'border: 0;'));
            ?>		    
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="email">Email</label>
          <div class="controls">
	    <?php echo $this->Form->input('email', array('label' => '', 'style' => 'border: 0;')); ?>		    
          </div>
        </div>
        <!--<div class="control-group">
          <label class="control-label" for="email">Email</label>
          <div class="controls">
	    <?php echo $this->Form->input('shortbio', array('label' => '', 'style' => 'border: 0;')); ?>		    
          </div>
        </div>-->
      </fieldset>
      <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn offset5')); ?>
    </div>    
    <div class="span6">
      <?php echo $this->Form->create('User', array('action' => 'change_password', 'class' => 'form-horizontal')); ?>
      
        <legend><a href="#" onclick="jQuery('#change-password').toggle('fade');"><?php echo __('Alterar Senha');
        ?></a></legend>
        <fieldset id="change-password" style="display: none;">
        <?php echo $this->Form->input('id'); ?>
        <div class="control-group">
          <label class="control-label" for="password">Senha Atual</label>
          <div class="controls">
	    <?php echo $this->Form->input('currentpassword', array('label' => '', 'value'
	    => '', 'type' => 'password')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Nova senha</label>
          <div class="controls">
	    <?php echo $this->Form->input('newpassword', array('label' => '', 'value'
	    => '', 'type' => 'password')); ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="checkpassword">Confirmar senha</label>
          <div class="controls">
	    <?php echo $this->Form->input('checkpassword', array('label' => '', 'value'
	    => '', 'type' => 'password')); ?>
          </div>
        </div>
        <?php echo $this->Form->submit('Alterar Senha', array('class' => 'btn offset5')); ?>
      </fieldset>
      <?php echo $this->Form->end(); ?>
    </div>
  </div>
  <div class="related">
    <?php if (!empty($obras)): ?>
    <h3><?php echo __('Obras cadastradas pelo usuário'); ?></h3>
    <?php foreach ($obras as $obra): ?>
    <div class="mini-obra">
      <a class="fancybox" href="#img_<?php echo $obra['Obra']['id'] ?>" data-fancybox-group="gallery"><?php echo $this->Html->image('obras/'.$obra['Obra']['id'].'_thumb.jpg'); ?>
      </a>

      <div id="img_<?php echo $obra['Obra']['id'] ?>" style="display: none;" class="modal_obra">
	<div>
	  <p><?php echo $this->Html->image(('obras/'.$obra['Obra']['imagem']), array('alt' => 'oie', 'border' => '0')); ?></p>
	  <p><?php echo $obra['Artista']['nome']; ?> (<?php echo h($obra['Obra']['ano_fim']); ?>)</p>
	  <p><?php echo $obra['Obra']['nome']; ?></p>
	</div>
      </div>
      <p>
	<?php echo $this->Html->link(
	h(substr($obra['Obra']['nome'], 0, 40)) . (strlen($obra['Obra']['nome']) > 40 ? '...' : ''), 
	array('controller' => 'obras', 'action' => 'view', $obra['Obra']['id']), 
	array('escape'=>false)); 
	?>
      </p>
      <p class="nome-artista">
	(<?php echo h($obra['Obra']['ano_fim']); ?>)
      </p>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    <div class="paging pagination pagination-centered">
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
</div>
