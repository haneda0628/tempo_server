<div class="stamps form">
<?php echo $this->Form->create('Stamp'); ?>
	<fieldset>
		<legend><?php echo __('Admin Edit Stamp'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('branch_id');
		echo $this->Form->input('member_id');
		echo $this->Form->input('stamped');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Stamp.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Stamp.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Stamps'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
