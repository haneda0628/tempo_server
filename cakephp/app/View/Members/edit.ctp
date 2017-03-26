<div class="members form">
<?php echo $this->Form->create('Member'); ?>
	<fieldset>
		<legend><?php echo __('Edit Member'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('firstname');
		echo $this->Form->input('lastname');
		echo $this->Form->input('address');
		echo $this->Form->input('phonenum1');
		echo $this->Form->input('phonenum2');
		echo $this->Form->input('email1');
		echo $this->Form->input('email2');
		echo $this->Form->input('role');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Member.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Member.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('action' => 'index')); ?></li>
	</ul>
</div>
