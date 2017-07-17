<div class="stamps view">
<h2><?php echo __('Stamp'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($stamp['Stamp']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stamp['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $stamp['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Member'); ?></dt>
		<dd>
			<?php echo $this->Html->link($stamp['Member']['id'], array('controller' => 'members', 'action' => 'view', $stamp['Member']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Stamped'); ?></dt>
		<dd>
			<?php echo h($stamp['Stamp']['stamped']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($stamp['Stamp']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($stamp['Stamp']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Stamp'), array('action' => 'edit', $stamp['Stamp']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Stamp'), array('action' => 'delete', $stamp['Stamp']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $stamp['Stamp']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Stamps'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Stamp'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
