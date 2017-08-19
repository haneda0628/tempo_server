<div class="coupons form">
<?php echo $this->Form->create('Coupon'); ?>
	<fieldset>
		<legend><?php echo __('Add Coupon'); ?></legend>
	<?php
		/*echo $this->Form->input('branch_id');*/
		echo $this->Form->input('title');
		echo $this->Form->input('contents');
		echo $this->Form->input('offer_condition');
		echo $this->Form->input('use_condition');
		echo $this->Form->input('effectiveness_condition');
		echo $this->Form->input('expired');
		echo $this->Form->input('published');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
	</ul>
</div>
