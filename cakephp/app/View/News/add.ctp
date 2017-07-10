<div class="news form">
<?php echo $this->Form->create('News', array('type' => 'file', 'enctype' => 'multipart/form-data'));?>
<fieldset>
<legend><?php echo __('Add News'); ?></legend>
<?php
echo $this->Form->input('user_id');
echo $this->Form->input('title');
echo $this->Form->input('contents');
echo $this->Form->input('image');
?>
</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
<h3><?php echo __('Actions'); ?></h3>
<ul>

<li><?php echo $this->Html->link(__('List News'), array('action' => 'index')); ?></li>
<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
</ul>
</div>
