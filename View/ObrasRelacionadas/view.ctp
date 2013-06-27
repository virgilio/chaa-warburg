<div class="obrasRelacionadas view">
<h2><?php  echo __('Obras Relacionada'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($obrasRelacionada['ObrasRelacionada']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Obra'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obrasRelacionada['Obra']['nome'], array('controller' => 'obras', 'action' => 'view', $obrasRelacionada['Obra']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Relacionada'); ?></dt>
		<dd>
			<?php echo $this->Html->link($obrasRelacionada['Relacionada']['nome'], array('controller' => 'obras', 'action' => 'view', $obrasRelacionada['Relacionada']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($obrasRelacionada['ObrasRelacionada']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($obrasRelacionada['ObrasRelacionada']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
