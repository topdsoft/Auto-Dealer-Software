<div class="sales form">
<?php echo $this->Form->create('Sale');?>
	<fieldset>
		<legend><?php __('Edit Sale'); ?></legend>
	<?php
//debug($this->data);
		echo $this->Form->input('id');
		echo "<strong>Sale ID:</strong>{$this->data['Sale']['id']}<br>";
		echo "<strong>Salesperson:</strong>{$this->data['User']['username']}<br>";
		echo '<strong>Customer:</strong>';
		echo $this->data['Customer']['fName'].' '.$this->data['Customer']['lName'].'<br>';
		echo $this->data['Customer']['phone'].'<br>';
		echo nl2br($this->data['Customer']['address']).'<br>';
		echo '<strong>Auto:</strong>'.$this->data['Auto']['year'].' '.$this->data['Auto']['model'].' VIN:'.$this->data['Auto']['vin'];
		echo $this->Form->input('salePrice');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Sale.id')), null, sprintf(__('Are you sure you want to delete sale# %s?', true), $this->Form->value('Sale.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto', true), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>