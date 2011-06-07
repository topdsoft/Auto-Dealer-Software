<div class="sales form">
<?php echo $this->Form->create('Sale');?>
	<fieldset>
		<legend><?php __('Add Sale'); ?></legend>
	<?php
		echo $this->Form->input('user_id',array('type'=>'hidden','value'=>$uid));
		echo $this->Form->input('customer_id',array('type'=>'hidden','value'=>$customer['Customer']['id']));
		echo $this->Form->input('auto_id',array('type'=>'hidden','value'=>$auto['Auto']['id']));
		echo '<strong>Customer:</strong>';
		echo $customer['Customer']['fName'].' '.$customer['Customer']['lName'].'<br>';
		echo $customer['Customer']['phone'].'<br>';
		echo nl2br($customer['Customer']['address']).'<br>';
		echo '<strong>Auto:</strong>'.$auto['Auto']['year'].' '.$auto['Make']['name'].' '.$auto['Auto']['model'].' VIN:'.$auto['Auto']['vin'];
		echo $this->Form->input('salePrice');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Sales', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Users', true), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User', true), array('controller' => 'users', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers', true), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customer', true), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto', true), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>