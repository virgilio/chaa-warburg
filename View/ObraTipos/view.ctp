<div class="obraTipos view">
<h2><?php  echo __('Obra Tipo'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nome'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['nome']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($obraTipo['ObraTipo']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
