<div class="makes view">
<h2><?php  __('Make');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $make['Make']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $make['Make']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Make', true), array('action' => 'edit', $make['Make']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Make', true), array('action' => 'delete', $make['Make']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $make['Make']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Makes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Make', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto', true), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Autos');?></h3>
	<?php if (!empty($make['Auto'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Make Id'); ?></th>
		<th><?php __('Body Id'); ?></th>
		<th><?php __('Model'); ?></th>
		<th><?php __('Trim'); ?></th>
		<th><?php __('Year'); ?></th>
		<th><?php __('Vin'); ?></th>
		<th><?php __('Mileage'); ?></th>
		<th><?php __('IntColor'); ?></th>
		<th><?php __('ExtColor'); ?></th>
		<th><?php __('Price'); ?></th>
		<th><?php __('Scancode'); ?></th>
		<th><?php __('Engine'); ?></th>
		<th><?php __('Transmission'); ?></th>
		<th><?php __('Created'); ?></th>
		<th><?php __('Sold'); ?></th>
		<th><?php __('Options'); ?></th>
		<th><?php __('Warranty'); ?></th>
		<th><?php __('Notes'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($make['Auto'] as $auto):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $auto['id'];?></td>
			<td><?php echo $auto['make_id'];?></td>
			<td><?php echo $auto['body_id'];?></td>
			<td><?php echo $auto['model'];?></td>
			<td><?php echo $auto['trim'];?></td>
			<td><?php echo $auto['year'];?></td>
			<td><?php echo $auto['vin'];?></td>
			<td><?php echo $auto['mileage'];?></td>
			<td><?php echo $auto['intColor'];?></td>
			<td><?php echo $auto['extColor'];?></td>
			<td><?php echo $auto['price'];?></td>
			<td><?php echo $auto['scancode'];?></td>
			<td><?php echo $auto['engine'];?></td>
			<td><?php echo $auto['transmission'];?></td>
			<td><?php echo $auto['created'];?></td>
			<td><?php echo $auto['sold'];?></td>
			<td><?php echo $auto['options'];?></td>
			<td><?php echo $auto['warranty'];?></td>
			<td><?php echo $auto['notes'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'autos', 'action' => 'view', $auto['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'autos', 'action' => 'edit', $auto['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'autos', 'action' => 'delete', $auto['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $auto['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Auto', true), array('controller' => 'autos', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
