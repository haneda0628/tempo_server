<div class="slides view">
<h2><?php echo __('Slide'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($slide['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $slide['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image1'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['image1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image2'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['image2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image3'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['image3']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($slide['Slide']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Slide'), array('action' => 'edit', $slide['Slide']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Slide'), array('action' => 'delete', $slide['Slide']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $slide['Slide']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Slides'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Slide'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div>
