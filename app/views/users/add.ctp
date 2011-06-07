<div class="users form">
<?php echo $this->Form->create('User');?>
	<fieldset>
		<legend><?php __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		if ($userlist) {
			//this is not the first user so show option for role
			echo 'The user\'s role determines how much access they are given:<br>';
			echo '1: Very basic user allowed only to view auto data<br>';
			echo '2: Sales Level access able to enter customer data and make sales<br>';
			echo '3: Manager level access, able to add users and autos<br>';
			echo $this->Form->input('role');
		} else {
			echo $this->Form->input('role',array('type'=>'hidden','value'=>3));
			echo '<strong>This is the first user and will be given full privelages in the system</strong>';
		}//endif
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>