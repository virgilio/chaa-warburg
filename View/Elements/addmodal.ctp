<!-- Modal -->
<div id="add-pais" class="modal hide fade" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="paises form">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"
              aria-hidden="true">×</button>
      <h3 id="titulo"><?php echo $titulo; ?></h3>
    </div>
    <div class="modal-body">
      <?php echo $this->element($form); ?>
    </div>
    <div class="modal-footer">
      <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
      <?php echo $this->Form->submit('Adicionar', array('class' => 'btn')); ?>
    </div>
    <?php echo $this->Form->end(); ?>
  </div>
</div>