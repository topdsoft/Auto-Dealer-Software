<div class="autos index">
	<h2><?php __('Autos');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('make_id');?></th>
			<th><?php echo $this->Paginator->sort('body_id');?></th>
			<th><?php echo $this->Paginator->sort('model');?></th>
			<th><?php echo $this->Paginator->sort('trim');?></th>
			<th><?php echo $this->Paginator->sort('year');?></th>
			<th><?php echo $this->Paginator->sort('mileage');?></th>
			<th><?php echo $this->Paginator->sort('intColor');?></th>
			<th><?php echo $this->Paginator->sort('extColor');?></th>
			<th><?php echo $this->Paginator->sort('price');?></th>
			<th><?php echo $this->Paginator->sort('engine');?></th>
			<th><?php echo $this->Paginator->sort('transmission');?></th>
			<th><?php if($role==3)echo $this->Paginator->sort('created');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($autos as $auto):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $auto['Make']['name']; ?>&nbsp;</td>
		<td><?php echo $auto['Body']['name']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['model']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['trim']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['year']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['mileage']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['intColor']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['extColor']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['price']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['engine']; ?>&nbsp;</td>
		<td><?php echo $auto['Auto']['transmission']; ?>&nbsp;</td>
		<td><?php if($role==3)echo $auto['Auto']['created']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $auto['Auto']['id'])); ?>
			<?php if($role==3)echo $this->Html->link(__('Edit', true), array('action' => 'edit', $auto['Auto']['id'])); ?>
			<?php if($role>1)echo $this->Html->link(__('Sell', true), array('controller' => 'sales','action' => 'add', $auto['Auto']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php if ($role==3) echo $this->Html->link(__('Scancode', true), array('action' => 'scancode')); ?></li>
		<li><?php if ($role==3) echo $this->Html->link(__('New Auto', true), array('action' => 'add')); ?></li>
		<li><?php if ($role==3) echo $this->Html->link(__('List Makes', true), array('controller' => 'makes', 'action' => 'index')); ?> </li>
		<li><?php if ($role==3) echo $this->Html->link(__('New Make', true), array('controller' => 'makes', 'action' => 'add')); ?> </li>
		<li><?php if ($role==3) echo $this->Html->link(__('List Bodies', true), array('controller' => 'bodies', 'action' => 'index')); ?> </li>
		<li><?php if ($role==3) echo $this->Html->link(__('New Body', true), array('controller' => 'bodies', 'action' => 'add')); ?> </li>
		<li><?php if ($role>=2) echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php if ($role>=2) echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php //if ($role>=2) echo $this->Html->link(__('New Sale', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>