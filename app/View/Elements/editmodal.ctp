<style type="text/css">
  .modal .modal-body {
    overflow-y: visible;
  }
</style>
<!-- Modal -->
<div id="edit-<?php echo $form; ?>" class="modal hide fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="form">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"
              aria-hidden="true">×</button>
      <h3 id="titulo"><?php echo $titulo; ?></h3>
    </div>
    <div class="modal-body">
      <?php echo $this->element($form); ?>
    </div>
    <div class="modal-footer">
      <ul class="unstyled inline">
        <li><button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Close</button></li>
        <li><?php echo $this->Form->submit('Salvar', array('class' => 'btn btn-success')); ?></li>
      </ul>
    </div>
    <?php echo $this->Form->end(); ?>
  </div>
</div>
