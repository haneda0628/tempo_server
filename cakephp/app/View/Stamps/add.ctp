<div class="stamps form">
<?php echo $this->Form->create('Stamp'); ?>
	<fieldset>
		<legend><?php echo __('Add Stamp'); ?></legend>
	<?php
		echo $this->Form->input('branch_id');
		echo $this->Form->input('member_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('スタンプを押す。')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Stamps'), array('action' => 'index')); ?></li>
	</ul>
</div>
