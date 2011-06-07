<div class="customers form">
<?php echo $this->Form->create('Customer');?>
	<fieldset>
		<legend><?php __('Add Customer'); ?></legend>
	<?php
		echo $this->Form->input('fName',array('label'=>'First Name'));
		echo $this->Form->input('lName',array('label'=>'Last Name'));
		echo $this->Form->input('phone');
		echo $this->Form->input('address');
		echo $this->Form->input('email');
		echo $this->Form->input('notes');
		echo $this->Form->input('auto_id',array('type'=>'hidden','value'=>$auto_id));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
	</ul>
</div>