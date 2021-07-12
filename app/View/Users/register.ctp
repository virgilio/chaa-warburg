<div class="users form container">
  <div class="row-fluid">
    <div class="register span6 form_login">
      <div class="area">
        <?php
            echo $this->Form->create(false, array(
                'url' => array('controller' => 'users', 'action' => 'register'),
                'class'=>'form-horizontal'
            ));
        ?>
        <div class="heading">
          <h4 class="form-heading">Criar nova conta</h4>
        </div>
        <div class="control-group">
          <label class="control-label" for="email">Seu E-mail</label>
          <div class="controls">
            <?php
               echo $this->Form->input('User.email', array('label'=>false, 'placeholder' => 'seuemail@email.com'));
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="nome">Seu Nome</label>
          <div class="controls">
            <?php
               echo $this->Form->input('User.nome', array('label'=>false, 'placeholder' => 'seu nome'));
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="password">Senha</label>
          <div class="controls">
            <?php
               echo $this->Form->input('User.password', array('label'=>false, 'placeholder' => 'sua senha'));
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Confirmar senha</label>
          <div class="controls">
            <?php
               echo $this->Form->input('User.password_confirm', array('type'=>'password', 'label'=>false, 'placeholder' => 'confirmar senha'));
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label" for="role">Notificações por email</label>
          <div class="controls">
          <?php echo $this->Form->input('User.notification_level', array('options' => array('0'
      => 'Nenhuma notificação', '1' => 'Apenas das minhas obras', '2' => 'De todas as obras'), 'label' => '')); ?>
          </div>
        </div>

        <?php echo $this->Form->end(__('Cadastrar!')); ?>
      </div>
    </div>


    <div class="users index span6 form_login">
      <div class="area">
        <?php
            echo $this->Form->create(false, array(
                'url' => array('controller' => 'users', 'action' => 'login'),
                'class'=>'form-horizontal'
            ));
        ?>
        <div class="heading">
          <h4 class="form-heading">Fazer login</h4>
        </div>
        <div class="control-group">
          <label class="control-label">Email</label>
          <div class="controls">
            <?php
               echo $this->Form->input('User.email', array('label'=>false));
            ?>
          </div>
        </div>
        <div class="control-group">
          <label class="control-label">Senha</label>
          <div class="controls">
            <?php
               echo $this->Form->input('User.password', array('label'=>false));
            ?>
          </div>
        </div>
        <?php echo $this->Form->end(__d('users', 'Entrar')); ?>
      </div>
    </div>
  </div>
</div>


