<table>
<?php foreach ($messages as $member): ?>
<tr>
<td><?php echo h($member['Message']['id']); ?>&nbsp;</td>
<td><?php echo h($member['Message']['contents']); ?>&nbsp;</td>
<td><?php echo h($member['Message']['member_id']); ?>&nbsp;</td>
<td><?php echo h($member['Message']['user_id']); ?>&nbsp;</td>
<td><?php echo h($member['Message']['is_received']); ?>&nbsp;</td>
<td><?php echo h($member['Message']['message_type']); ?>&nbsp;</td>
<td><?php echo h($member['Message']['created']); ?>&nbsp;</td>
<td><?php echo h($member['Message']['modified']); ?>&nbsp;</td>
</tr>
<?php endforeach; ?>
</table>

<div class="messages form">
<?php echo $this->Form->create('Message'); ?>
<fieldset>
<legend><?php echo __('メッセージ投稿'); ?></legend>
<?php
echo $this->Form->input('contents');
?>
</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
