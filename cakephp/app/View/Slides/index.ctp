<div class="slides index">
	<h2><?php echo __('Slides'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_id'); ?></th>
			<th><?php echo $this->Paginator->sort('image1'); ?></th>
			<th><?php echo $this->Paginator->sort('image2'); ?></th>
			<th><?php echo $this->Paginator->sort('image3'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($slides as $slide): ?>
	<tr>
		<td><?php echo h($slide['Slide']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($slide['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $slide['Branch']['id'])); ?>
		</td>
		<td><?php echo h($slide['Slide']['image1']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['image2']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['image3']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['created']); ?>&nbsp;</td>
		<td><?php echo h($slide['Slide']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $slide['Slide']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $slide['Slide']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $slide['Slide']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $slide['Slide']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Slide'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
	</ul>
</div>
