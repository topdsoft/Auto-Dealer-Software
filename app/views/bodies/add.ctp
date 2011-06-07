<div class="bodies form">
<?php echo $this->Form->create('Body');?>
	<fieldset>
		<legend><?php __('Add Body'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Bodies', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto', true), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>