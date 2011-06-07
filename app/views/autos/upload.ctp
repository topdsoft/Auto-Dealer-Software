<div class="autos form">
<?php echo $this->Form->create('Auto',array('enctype'=>'multipart/form-data'));?>
<?php
//	echo '	<input type="hidden" name="MAX_FILE_SIZE" value="524288">';
	echo $this->Form->input('MAX_FILE_SIZE',array('type'=>'hidden','value'=>'524288'));
	echo '	<fieldset><legend>Select a JPEG or PNG image of 512KB or smaller to be uploaded:</legend>';
//	echo '	<p><b>File:</b> <input type="file" name="upload" /></p>';
	echo $this->Form->input('upload',array('type'=>'file','label'=>'File:'));
	echo ' 	</fieldset>';
//	echo '	<div align="center"><input type="submit" name="submit" value="Submit" /></div>';
//	echo '	<input type="hidden" name="submitted" value="TRUE" />';
//	echo "<input type='hidden' name='listingID' value='$listingID'>";
	echo $this->Form->input('autoID',array('type'=>'hidden','value'=>$autoID));
	echo $this->Form->input('submitted',array('type'=>'hidden','value'=>'true'));
	echo $this->Form->end(__('Submit', true));
?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Auto.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Auto.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Set ScanCode', true), array('action' => 'editscancode',$this->Form->value('Auto.id')));?></li>
		<li><?php echo $this->Html->link(__('List Autos', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Makes', true), array('controller' => 'makes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Make', true), array('controller' => 'makes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Bodies', true), array('controller' => 'bodies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Body', true), array('controller' => 'bodies', 'action' => 'add')); ?> </li>
	</ul>
</div>