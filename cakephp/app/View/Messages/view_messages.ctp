<style>
#hnd-message-contents {
  width:100%;
}

#hnd-message-submit {

}

</style>

<div class="messages index">
	<h2><?php echo __('Messages'); ?></h2>

	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('contents', 'メッセージ内容'); ?></th>
			<th><?php echo $this->Paginator->sort('member_id', 'メンバー名'); ?></th>
			<th><?php echo $this->Paginator->sort('is_received', '発信/受信'); ?></th>
			<th><?php echo $this->Paginator->sort('created', '発信日時'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($messages as $message): ?>
	<tr>
		<td><?php echo h($message['Message']['contents']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($message['Member']['lastname'].' '.$message['Member']['firstname'], array('controller' => 'members', 'action' => 'view', $message['Member']['id'])); ?>
		</td>
    <td><?php if($message['Message']['is_received']) { echo "受信";} else {echo "発信";} ?>&nbsp;</td>
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
  <div class="messages form">
  <?php echo $this->Form->create(null, array('url' => '/messages/viewMessages/'.$memberId)); ?>
    <fieldset>
      <legend><?php echo __('メッセージを入力ください。'); ?></legend>
      <?php
      echo $this->Form->input('contents', array(
        'type' => 'textarea',
        'label' => false,
        'id' => 'hnd-message-contents'
      ));
      echo $this->Form->hidden('member_id', array('value' => $memberId));
      echo $this->Form->hidden('user_id', array('value' => $user['id']));
      echo $this->Form->hidden('is_received', array('value' => false));
      echo $this->Form->hidden('message_type', array('value' => 1));

      //echo $this->Form->input('member_id');
      //echo $this->Form->input('user_id');
      //echo $this->Form->input('is_received');
      //echo $this->Form->input('message_type');
      ?>
    </fieldset>
    <?php echo $this->Form->end(
      array(
        'label' => '送信',
        'id' => 'hnd-message-submit'
      )); ?>
  </div>
</div>
