<?php $this->Html->css('login.css', null, array("inline" => false)); ?>
<div class="users form container">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User', array('class' => 'form-horizontal'));?>
    <fieldset>
        <legend><?php echo __('Insira seu email e senha'); ?></legend>
        <div class="control-group">
          <label class="control-label" for="email">Email</label>
          <div class="controls">
            <?php echo $this->Form->input('email', array('class'=>'input-xlarge','label' => '')); ?>           
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Senha</label>
          <div class="controls">
            <?php echo $this->Form->input('password', array('class'=>'input-xlarge','label' => '')); ?>           
          </div>
        </div>
    </fieldset>
<?php echo $this->Form->end(array('label' => 'Entrar', 'class' => 'btn'));?>
</div>