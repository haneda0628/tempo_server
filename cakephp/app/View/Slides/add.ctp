<div class="slides form">
<?php echo $this->Form->create('Slide'); ?>
	<fieldset>
		<legend><?php echo __('Add Slide'); ?></legend>
	<?php
		echo $this->Form->input('branch_id');
		echo $this->Form->input('image1');
		echo $this->Form->input('image2');
		echo $this->Form->input('image3');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Slides'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div>
