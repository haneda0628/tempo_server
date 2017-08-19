<div class="coupons index">
  <style>

  </style>
	<h2><?php echo __('Coupons'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id', '発行番号'); ?></th>
			<th><?php echo $this->Paginator->sort('branch_id', '加盟店'); ?></th>
			<th><?php echo $this->Paginator->sort('title', 'タイトル'); ?></th>
			<th><?php echo $this->Paginator->sort('offer_condition', '提示条件'); ?></th>
			<th><?php echo $this->Paginator->sort('use_condition', '使用条件'); ?></th>
			<th><?php echo $this->Paginator->sort('effectiveness_condition', '有効条件'); ?></th>
			<th><?php echo $this->Paginator->sort('expired', '期限'); ?></th>
			<th><?php echo $this->Paginator->sort('published', '発行日'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($coupons as $coupon): ?>
	<tr>
		<td><?php echo h($coupon['Coupon']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($coupon['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $coupon['Branch']['id'])); ?>
		</td>
		<td><?php echo h($coupon['Coupon']['title']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['offer_condition']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['use_condition']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['effectiveness_condition']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['expired']); ?>&nbsp;</td>
		<td><?php echo h($coupon['Coupon']['published']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $coupon['Coupon']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $coupon['Coupon']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $coupon['Coupon']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
  <br/>
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
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?></li>
	</ul>
</div>
