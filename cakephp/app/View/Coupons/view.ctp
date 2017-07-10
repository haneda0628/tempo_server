<div class="coupons view">
<h2><?php echo __('Coupon'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Branch'); ?></dt>
		<dd>
			<?php echo $this->Html->link($coupon['Branch']['name'], array('controller' => 'branches', 'action' => 'view', $coupon['Branch']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Contents'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['contents']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Offer Condition'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['offer_condition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Use Condition'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['use_condition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Effectiveness Condition'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['effectiveness_condition']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Expired'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['expired']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Published'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['published']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($coupon['Coupon']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Coupon'), array('action' => 'edit', $coupon['Coupon']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Coupon'), array('action' => 'delete', $coupon['Coupon']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $coupon['Coupon']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Coupons'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Coupon'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('controller' => 'members', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Members'); ?></h3>
	<?php if (!empty($coupon['Member'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Age'); ?></th>
		<th><?php echo __('Sex'); ?></th>
		<th><?php echo __('Phonenum1'); ?></th>
		<th><?php echo __('Phonenum2'); ?></th>
		<th><?php echo __('Email1'); ?></th>
		<th><?php echo __('Email2'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($coupon['Member'] as $member): ?>
		<tr>
			<td><?php echo $member['id']; ?></td>
			<td><?php echo $member['username']; ?></td>
			<td><?php echo $member['password']; ?></td>
			<td><?php echo $member['firstname']; ?></td>
			<td><?php echo $member['lastname']; ?></td>
			<td><?php echo $member['address']; ?></td>
			<td><?php echo $member['age']; ?></td>
			<td><?php echo $member['sex']; ?></td>
			<td><?php echo $member['phonenum1']; ?></td>
			<td><?php echo $member['phonenum2']; ?></td>
			<td><?php echo $member['email1']; ?></td>
			<td><?php echo $member['email2']; ?></td>
			<td><?php echo $member['role']; ?></td>
			<td><?php echo $member['branch_id']; ?></td>
			<td><?php echo $member['created']; ?></td>
			<td><?php echo $member['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'members', 'action' => 'view', $member['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'members', 'action' => 'edit', $member['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'members', 'action' => 'delete', $member['id']), array('confirm' => __('Are you sure you want to delete # %s?', $member['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Member'), array('controller' => 'members', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
