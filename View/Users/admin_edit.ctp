<div class="users form container">
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
    <fieldset style="border: 1px solid #eee">
      <h5>Para altera a senha, preencha os dois campos abaixo</h5>
      <div class="control-group">
        <label class="control-label" for="password">Nova senha</label>
        <div class="controls">
	  <?php echo $this->Form->input('password', array('label' => '')); ?>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="checkpassword">Confirmar senha</label>
        <div class="controls">
	  <?php echo $this->Form->input('password_confirm', array('label' => '',
	  'type' => 'password')); ?>
        </div>
      </div>
    </fieldset>
    <?php if($auth['role'] == 'admin'): ?>
    <div class="control-group">
      <label class="control-label" for="role">Papel</label>
      <div class="controls">
        
	<?php echo $this->Form->input('role', array('options' => array('admin'
	=> 'Admin', 'author' => 'Author'), 'label' => '')); ?>
	<p class="help-block">Opções: admin ou author.</p>		    
      </div>
    </div>
    <?php endif ?>
  </fieldset>
  <?php echo $this->Form->end(array('label' => 'Salvar', 'class' => 'btn')); ?>
  
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
</div>
