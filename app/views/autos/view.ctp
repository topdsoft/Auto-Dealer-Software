<div class="autos view">
<h2><?php  __('Auto');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Make'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Make']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Model'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['model']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Trim'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['trim']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Body']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Year'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['year']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Vin'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['vin']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Mileage'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['mileage']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Interior Color'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['intColor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Exterior Color'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['extColor']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Price'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['price']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Scancode'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['scancode']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Engine'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['engine']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Transmission'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['transmission']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date Listed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if($role>1)echo $auto['Auto']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Sold'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $auto['Auto']['sold']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Options'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($auto['Auto']['options']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Warranty'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo nl2br($auto['Auto']['warranty']); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Notes'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php if($role>1)echo nl2br($auto['Auto']['notes']); ?>
			&nbsp;
		</dd>
		<?php foreach($auto['Image'] as $img) echo '<br>'.$this->Html->image('../files/'.$img['filename']);  ?>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php if($role==3)echo $this->Html->link(__('Edit Auto', true), array('action' => 'edit', $auto['Auto']['id'])); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('Delete Auto', true), array('action' => 'delete', $auto['Auto']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $auto['Auto']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('action' => 'index')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('New Auto', true), array('action' => 'add')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('List Makes', true), array('controller' => 'makes', 'action' => 'index')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('New Make', true), array('controller' => 'makes', 'action' => 'add')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('List Bodies', true), array('controller' => 'bodies', 'action' => 'index')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('New Body', true), array('controller' => 'bodies', 'action' => 'add')); ?> </li>
		<li><?php if($role==3)echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php if($role>=2)echo $this->Html->link(__('New Sale', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<?php if (!empty($auto['Sale'])):?>
	<h3><?php __('Related Sale');?></h3>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Sale Id'); ?></th>
		<th><?php __('Salesperson Id'); ?></th>
		<th><?php __('Customer Id'); ?></th>
		<th><?php __('Sale Date'); ?></th>
		<th><?php __('Sale Price'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($auto['Sale'] as $sale):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $this->Html->link($sale['id'],array('controller'=>'sales','action'=>'view',$sale['id']));?></td>
			<td><?php echo $this->Html->link($sale['user_id'],array('controller'=>'users','action'=>'view',$sale['user_id']));?></td>
			<td><?php echo $this->Html->link($sale['customer_id'],array('controller'=>'customers','action'=>'view',$sale['customer_id']));?></td>
			<td><?php echo $sale['created'];?></td>
			<td><?php echo $sale['salePrice'];?></td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

</div>
