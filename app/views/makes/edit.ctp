<div class="makes form">
<?php echo $this->Form->create('Make');?>
	<fieldset>
		<legend><?php __('Edit Make'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Make.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Make.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Makes', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('controller' => 'autos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Auto', true), array('controller' => 'autos', 'action' => 'add')); ?> </li>
	</ul>
</div>