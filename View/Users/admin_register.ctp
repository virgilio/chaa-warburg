<?php
  $this->Html->css('bootstrapSwitch.css', null, 
                    array('inline' => false)); 
  $this->Html->script('bootstrapSwitch.min.js', array('inline' => false));
?>
<div class="users form container">
  <div class="row-fluid">
    <div class="register span12 form_login"> 
      <div class="area">
        <?php echo $this->Form->create('User', array('action' => '/register','class'=>'form-horizontal')); ?>
        <div class="heading">
          <h4 class="form-heading">Criar nova conta</h4>
        </div>
        <div class="control-group">
          <label class="control-label" for="email">Seu E-mail</label>
          <div class="controls">
            <?php
               echo $this->Form->input('email', array('label'=>false, 'placeholder' => 'email@email.com')); 
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="nome">Seu Nome</label>
          <div class="controls">
            <?php
               echo $this->Form->input('nome', array('label'=>false, 'placeholder' => 'Nome')); 
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Senha</label>
          <div class="controls">
            <?php
               echo $this->Form->input('password', array('label'=>false, 'placeholder' => 'senha')); 
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Confirmar senha</label>
          <div class="controls">
            <?php
               echo $this->Form->input('password_confirm', array('type'=>'password', 'label'=>false, 'placeholder' => 'confirmar senha')); 
            ?>
          </div>
        </div>     
        <div class="control-group">
          <label class="control-label" for="role">Notificações por email</label>
          <div class="controls">
          <?php 
            echo $this->Form->input('notification_level', 
                                array(
                                    'options' => 
                                    array(
                                        '0' => 'Nenhuma notificação', 
                                        '1' => 'Apenas das minhas obras', 
                                        '2' => 'De todas as obras'), 
                                    'label' => false)); 
          ?>
          </div>
        </div>  
        
        <?php if($auth['role'] == 'admin'): ?>
        <div class="control-group">
          <label class="control-label" for="role">Papel</label>
          <div class="controls">
            <?php 
                echo $this->Form->input('role', 
                                    array('options' => array(
                                            'admin' => 'Admin', 
                                            'author' => 'Colaborador'), 
                                   'label' => false)); 
            ?>
          </div>
        </div>
      
        <div class="control-group">
            <label class="control-label" for="role">Usuário Ativo</label>
            <div class="controls">
            <div class="make-switch"
               data-on="success" 
               data-off="danger"  
               data-on-label="<i class='icon-ok icon-white'></i>" 
               data-off-label="<i class='icon-remove'></i>">
                <?php 
                    echo $this->Form->input('active', 
                                            array(
                                                'label' => false,
                                                'hiddenField' => true, 
                                                'div' => false)); 
                ?>
            </div>
        </div>
    </div>    
    <?php endif ?>

        <?php 
            echo $this->Form->end(array(
                                    "class" => "btn btn-success", 
                                    "label" => __('Cadastrar!'))); 
        ?>
      </div>
    </div>
  </div>
</div>


