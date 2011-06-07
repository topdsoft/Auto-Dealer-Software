<div class="customers index">
	<h2><?php __('Customers');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('Last Name');?></th>
			<th><?php echo $this->Paginator->sort('First Name');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($customers as $customer):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $customer['Customer']['lName']; ?>&nbsp;</td>
		<td><?php echo $customer['Customer']['fName']; ?>&nbsp;</td>
		<td class="actions">
			<?php if($auto_id) echo $this->Html->link(__('Sell To', true), array('controller'=>'sales','action' => 'add', $auto_id, $customer['Customer']['id'])); ?>
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $customer['Customer']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $customer['Customer']['id'])); ?>
			<?php if($role==3) echo $this->Html->link(__('Delete', true), array('action' => 'delete', $customer['Customer']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $customer['Customer']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Customer', true), array('action' => 'add',$auto_id)); ?></li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
	</ul>
</div>