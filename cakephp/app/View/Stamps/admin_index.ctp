<div class="stamps index">
	<h2><?php echo __('Stamps'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_id'); ?></th>
			<th><?php echo $this->Paginator->sort('member_id'); ?></th>
			<th><?php echo $this->Paginator->sort('stamped'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($stamps as $stamp): ?>
	<tr>
		<td><?php echo h($stamp['Stamp']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($stamp['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $stamp['Branch']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($stamp['Member']['id'], array('controller' => 'members', 'action' => 'view', $stamp['Member']['id'])); ?>
		</td>
		<td><?php echo h($stamp['Stamp']['stamped']); ?>&nbsp;</td>
		<td><?php echo h($stamp['Stamp']['created']); ?>&nbsp;</td>
		<td><?php echo h($stamp['Stamp']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $stamp['Stamp']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $stamp['Stamp']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $stamp['Stamp']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $stamp['Stamp']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Stamp'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
