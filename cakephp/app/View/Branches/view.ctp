<div class="branches view">
<h2><?php echo __('Branch'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Company'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branch['Company']['name'], array('controller' => 'companies', 'action' => 'view', $branch['Company']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Area'); ?></dt>
		<dd>
			<?php echo $this->Html->link($branch['Area']['name'], array('controller' => 'areas', 'action' => 'view', $branch['Area']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phonenum'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['phonenum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($branch['Branch']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Branch'), array('action' => 'edit', $branch['Branch']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Branch'), array('action' => 'delete', $branch['Branch']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branch['Branch']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('controller' => 'companies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('controller' => 'companies', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Areas'), array('controller' => 'areas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Area'), array('controller' => 'areas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales Representatives'), array('controller' => 'sales_representatives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales Representative'), array('controller' => 'sales_representatives', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Sales Representatives'); ?></h3>
	<?php if (!empty($branch['SalesRepresentative'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Username'); ?></th>
		<th><?php echo __('Password'); ?></th>
		<th><?php echo __('Firstname'); ?></th>
		<th><?php echo __('Lastname'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Phonenum'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Branch Id'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($branch['SalesRepresentative'] as $salesRepresentative): ?>
		<tr>
			<td><?php echo $salesRepresentative['id']; ?></td>
			<td><?php echo $salesRepresentative['username']; ?></td>
			<td><?php echo $salesRepresentative['password']; ?></td>
			<td><?php echo $salesRepresentative['firstname']; ?></td>
			<td><?php echo $salesRepresentative['lastname']; ?></td>
			<td><?php echo $salesRepresentative['address']; ?></td>
			<td><?php echo $salesRepresentative['phonenum']; ?></td>
			<td><?php echo $salesRepresentative['email']; ?></td>
			<td><?php echo $salesRepresentative['branch_id']; ?></td>
			<td><?php echo $salesRepresentative['company_id']; ?></td>
			<td><?php echo $salesRepresentative['role']; ?></td>
			<td><?php echo $salesRepresentative['created']; ?></td>
			<td><?php echo $salesRepresentative['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'sales_representatives', 'action' => 'view', $salesRepresentative['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'sales_representatives', 'action' => 'edit', $salesRepresentative['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'sales_representatives', 'action' => 'delete', $salesRepresentative['id']), array('confirm' => __('Are you sure you want to delete # %s?', $salesRepresentative['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Sales Representative'), array('controller' => 'sales_representatives', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
