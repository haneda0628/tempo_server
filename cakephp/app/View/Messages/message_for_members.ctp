<div class="messages index">
	<h2><?php echo __('Messages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('contents', 'メッセージ内容'); ?></th>
			<th><?php echo $this->Paginator->sort('member_id', 'メンバーID'); ?></th>
			<th><?php echo $this->Paginator->sort('is_received', '発信/受信'); ?></th>
			<th><?php echo $this->Paginator->sort('message_type', 'メッセージ種別'); ?></th>
			<th><?php echo $this->Paginator->sort('created', '発信日時'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($messages as $message): ?>
	<tr>
		<td><?php echo h($message['Message']['contents']); ?>&nbsp;</td>
		<td>
      <?php echo h($message['Message']['member_id']); ?>&nbsp;
			<?php echo $this->Html->link($message['Member']['id'], array('controller' => 'members', 'action' => 'view', $message['Member']['id'])); ?>
		</td>
    <td><?php if($message['Message']['is_received']) { echo "受信";} else {echo "発信";} ?>&nbsp;</td>
		<td><?php echo h($message['Message']['message_type']); ?>&nbsp;</td>
		<td><?php echo h($message['Message']['created']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $message['Message']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $message['Message']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $message['Message']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $message['Message']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
    'format' => __('{:pages}ページ中 {:page}ページ目  , 全{:count}レコード中{:current}レコード , {:start} 〜 {:end}')
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
		<li><?php echo $this->Html->link(__('New Message'), array('action' => 'add')); ?></li>
	</ul>
</div>
