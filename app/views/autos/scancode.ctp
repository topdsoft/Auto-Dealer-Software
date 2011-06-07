<div class="autos form">
<?php echo $this->Form->create('Auto');?>
	<fieldset>
		<legend><?php __('Find Auto'); ?></legend>
	<?php
		echo $this->Form->input('scancode',array('id'=>'sc'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<script type='text/javascript'>document.getElementById('sc').focus();</script>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Autos', true), array('action' => 'index'));?></li>
	</ul>
</div>