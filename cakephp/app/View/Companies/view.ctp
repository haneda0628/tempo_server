<div class="companies view">
<h2><?php echo __('Company'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($company['Company']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($company['Company']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($company['Company']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($company['Company']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($company['Company']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phonenum'); ?></dt>
		<dd>
			<?php echo h($company['Company']['phonenum']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email'); ?></dt>
		<dd>
			<?php echo h($company['Company']['email']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($company['Company']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($company['Company']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Company'), array('action' => 'edit', $company['Company']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Company'), array('action' => 'delete', $company['Company']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $company['Company']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Companies'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Company'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Branches'), array('controller' => 'branches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Sales Representatives'), array('controller' => 'sales_representatives', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Sales Representative'), array('controller' => 'sales_representatives', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Branches'); ?></h3>
	<?php if (!empty($company['Branch'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Company Id'); ?></th>
		<th><?php echo __('Area Id'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Phonenum'); ?></th>
		<th><?php echo __('Email'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($company['Branch'] as $branch): ?>
		<tr>
			<td><?php echo $branch['id']; ?></td>
			<td><?php echo $branch['name']; ?></td>
			<td><?php echo $branch['company_id']; ?></td>
			<td><?php echo $branch['area_id']; ?></td>
			<td><?php echo $branch['address']; ?></td>
			<td><?php echo $branch['phonenum']; ?></td>
			<td><?php echo $branch['email']; ?></td>
			<td><?php echo $branch['created']; ?></td>
			<td><?php echo $branch['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'branches', 'action' => 'view', $branch['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'branches', 'action' => 'edit', $branch['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'branches', 'action' => 'delete', $branch['id']), array('confirm' => __('Are you sure you want to delete # %s?', $branch['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Branch'), array('controller' => 'branches', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Sales Representatives'); ?></h3>
	<?php if (!empty($company['SalesRepresentative'])): ?>
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
	<?php foreach ($company['SalesRepresentative'] as $salesRepresentative): ?>
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