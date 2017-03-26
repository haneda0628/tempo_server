<div class="members view">
<h2><?php echo __('Member'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($member['Member']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Username'); ?></dt>
		<dd>
			<?php echo h($member['Member']['username']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Password'); ?></dt>
		<dd>
			<?php echo h($member['Member']['password']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Firstname'); ?></dt>
		<dd>
			<?php echo h($member['Member']['firstname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Lastname'); ?></dt>
		<dd>
			<?php echo h($member['Member']['lastname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Address'); ?></dt>
		<dd>
			<?php echo h($member['Member']['address']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phonenum1'); ?></dt>
		<dd>
			<?php echo h($member['Member']['phonenum1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Phonenum2'); ?></dt>
		<dd>
			<?php echo h($member['Member']['phonenum2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email1'); ?></dt>
		<dd>
			<?php echo h($member['Member']['email1']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Email2'); ?></dt>
		<dd>
			<?php echo h($member['Member']['email2']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($member['Member']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($member['Member']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($member['Member']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Member'), array('action' => 'edit', $member['Member']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Member'), array('action' => 'delete', $member['Member']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $member['Member']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Members'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Member'), array('action' => 'add')); ?> </li>
	</ul>
</div>
