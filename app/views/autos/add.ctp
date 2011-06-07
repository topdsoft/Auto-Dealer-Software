<div class="autos form">
<?php echo $this->Form->create('Auto');?>
	<fieldset>
		<legend><?php __('Add Auto'); ?></legend>
	<?php
		echo $this->Form->input('make_id');
		echo $this->Form->input('model');
		echo $this->Form->input('trim');
		echo $this->Form->input('year');
		echo $this->Form->input('vin');
		echo $this->Form->input('mileage');
		echo $this->Form->input('intColor');
		echo $this->Form->input('extColor');
		echo $this->Form->input('body_id');
		echo $this->Form->input('price');
//		echo $this->Form->input('scancode');
		echo $this->Form->input('engine');
		echo $this->Form->input('transmission');
		echo $this->Form->input('options');
		echo $this->Form->input('warranty');
		echo $this->Form->input('notes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Autos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Makes', true), array('controller' => 'makes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Make', true), array('controller' => 'makes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bodies', true), array('controller' => 'bodies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Body', true), array('controller' => 'bodies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales', true), array('controller' => 'sales', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sale', true), array('controller' => 'sales', 'action' => 'add')); ?> </li>
	</ul>
</div>