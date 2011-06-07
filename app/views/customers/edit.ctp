<div class="customers form">
<?php echo $this->Form->create('Customer');?>
	<fieldset>
		<legend><?php __('Edit Customer'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('fName');
		echo $this->Form->input('lName');
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('email');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Customer.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Customer.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>