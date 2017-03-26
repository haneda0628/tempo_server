<div class="branches form">
<?php echo $this->Form->create('Branch'); ?>
	<fieldset>
		<legend><?php echo __('Add Branch'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('company_id');
		echo $this->Form->input('area_id');
		echo $this->Form->input('address');
		echo $this->Form->input('phonenum');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales Representatives'), array('controller' => 'sales_representatives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales Representative'), array('controller' => 'sales_representatives', 'action' => 'add')); ?> </li>
	</ul>
</div>
