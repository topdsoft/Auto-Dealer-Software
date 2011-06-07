<div class="autos form">
<?php echo $this->Form->create('Auto');?>
	<fieldset>
		<legend><?php __('Set Auto Scancode'); ?></legend>
	<?php
		echo 'Scan Barcode for Auto: ';
		echo "{$this->data['Auto']['year']} {$this->data['Make']['name']} {$this->data['Auto']['model']} VIN:{$this->data['Auto']['vin']}";
		echo $this->Form->input('scancode',array('id'=>'sc','label'=>''));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<script type='text/javascript'>document.getElementById('sc').focus();</script>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Auto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Auto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Edit Auto', true), array('action' => 'edit',$this->Form->value('Auto.id')));?></li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Makes', true), array('controller' => 'makes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Make', true), array('controller' => 'makes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bodies', true), array('controller' => 'bodies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Body', true), array('controller' => 'bodies', 'action' => 'add')); ?> </li>
	</ul>
</div>