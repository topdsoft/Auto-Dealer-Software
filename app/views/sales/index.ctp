<div class="sales index">
	<h2><?php __('Sales');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Sale#','id');?></th>
			<th><?php echo $this->Paginator->sort('Salesperson','user_id');?></th>
			<th><?php echo $this->Paginator->sort('customer_id');?></th>
			<th><?php echo $this->Paginator->sort('Auto VIN','auto_id');?></th>
			<th><?php echo $this->Paginator->sort('Sale Date','created');?></th>
			<th><?php echo $this->Paginator->sort('salePrice');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($sales as $sale):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $sale['Sale']['id']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($sale['User']['username'], array('controller' => 'users', 'action' => 'view', $sale['User']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sale['Customer']['lName'], array('controller' => 'customers', 'action' => 'view', $sale['Customer']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($sale['Auto']['vin'], array('controller' => 'autos', 'action' => 'view', $sale['Auto']['id'])); ?>
		</td>
		<td><?php echo $sale['Sale']['created']; ?>&nbsp;</td>
		<td><?php echo $sale['Sale']['salePrice']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $sale['Sale']['id'])); ?>
			<?php if($role==3)echo $this->Html->link(__('Edit', true), array('action' => 'edit', $sale['Sale']['id'])); ?>
			<?php if($role==3)echo $this->Html->link(__('Delete', true), array('action' => 'delete', $sale['Sale']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $sale['Sale']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Sale', true), array('action' => 'add')); ?></li>
		<li><?php if($role==3)echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('New Auto', true), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>