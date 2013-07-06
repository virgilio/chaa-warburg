<?php 
   //$this->Html->css('bootstrap-combined.min.css', null, array('inline' =>
   //false)); 
   $this->Html->css('bootstrapSwitch.css', null, array('inline' =>
   false)); 
   $this->Html->script('bootstrapSwitch.min.js', array('inline' => false));
?>
<div class="users form">
  <?php echo $this->Form->create('User', array('class' => 'form-horizontal')); ?>
  <fieldset>
    <legend><?php echo __('Editar conta'); ?></legend>
    <?php echo $this->Form->input('id');?>
    <div class="control-group">
      <label class="control-label" for="nome">Nome</label>
      <div class="controls">
	<?php echo $this->Form->input('nome', array('label' => '')); ?>		    
      </div>
    </div>
    <div class="control-group">
      <label class="control-label" for="email">Email</label>
      <div class="controls">
	<?php echo $this->Form->input('email', array('label' => '')); ?>		    
      </div>
    </div>
    <a href="#" class="offset2"
       onclick="jQuery('#change-password').toggle('fade'); return false;">
      <?php echo  __('Alterar Senha');?>
    </a>
    <fieldset id="change-password" class="" style="display:none;">
      <h5 class="offset2 text-error">Para altera a senha, preencha os dois campos abaixo</h5>
      <div class="control-group alert alert-warning">
        <label class="control-label" for="password">Nova senha</label>
        <div class="controls">
	  <?php echo $this->Form->input('password', array('label' => '', 'value'
	  => '', 'required' => false)); ?>
        </div>
      </div>
      <div class="control-group alert alert-warning">
        <label class="control-label" for="checkpassword">Confirmar senha</label>
        <div class="controls">
	  <?php echo $this->Form->input('password_confirm', array('label' => '',
	  'type' => 'password', 'required' => false)); ?>
        </div>
      </div>
    </fieldset>
    
    <?php if($auth['role'] == 'admin'): ?>
    <div class="control-group">
      <label class="control-label" for="role">Papel</label>
      <div class="controls">
        
	<?php echo $this->Form->input('role', array('options' => array('admin'
	=> 'Admin', 'author' => 'Colaborador'), 'label' => '')); ?>
      </div>
    </div>
    
    <div class="control-group">
      <label class="control-label" for="role">Usuário Ativo</label>
      <div class="controls">
        <div class="switch"
             data-on="success" 
             data-off="danger"  
             data-on-label="<i class='icon-ok icon-white'></i>" 
             data-off-label="<i class='icon-remove'></i>">
          <?php echo $this->Form->input('active', array('label' => false,
          'hiddenField' => true, 'div' => false)); ?>
        </div>
      </div>
    </div>
    
    <?php endif ?>
  </fieldset>
  <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn')); ?>
</div>
<div class="related">
  <?php if (!empty($obras)): ?>
  <h3><?php echo __('Obras cadastradas pelo usuário'); ?></h3>
  <?php foreach ($obras as $obra): ?>
  <div class="mini-obra">
    <a class="fancybox" 
       href="#img_<?php echo $obra['Obra']['id'] ?>" 
       data-fancybox-group="gallery"><?php echo $this->Html->image('obras/'.$obra['Obra']['id'].'_thumb.jpg'); ?>
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
</div>

