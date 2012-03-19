<div class="ftpGroups view">
<h2><?php  __('Ftp Group');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Groupname'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpGroup['FtpGroup']['groupname']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpGroup['FtpGroup']['gid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Members'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpGroup['FtpGroup']['members']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Description'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpGroup['FtpGroup']['description']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ftp Group', true), array('action' => 'edit', $ftpGroup['FtpGroup']['gid'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ftp Group', true), array('action' => 'delete', $ftpGroup['FtpGroup']['gid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpGroup['FtpGroup']['gid'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Groups', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Group', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('controller' => 'ftp_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('controller' => 'ftp_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Ftp Users');?></h3>
	<?php if (!empty($ftpGroup['FtpUser'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Name'); ?></th>
		<th><?php __('Email'); ?></th>
		<th><?php __('Userid'); ?></th>		
		<th><?php __('Status'); ?></th>
		<th><?php __('Expired'); ?></th>		
		<th><?php __('Accessed'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ftpGroup['FtpUser'] as $ftpUser):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $ftpUser['name'];?></td>
			<td><?php echo $ftpUser['email'];?></td>
			<td><?php echo $ftpUser['userid'];?></td>			
			<td><?php echo $ftpUser['status'];?></td>
			<td><?php echo $ftpUser['expired'];?></td>
			<td><?php echo $ftpUser['accessed'];?></td>

			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'ftp_users', 'action' => 'view', $ftpUser['id'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'ftp_users', 'action' => 'edit', $ftpUser['id'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'ftp_users', 'action' => 'delete', $ftpUser['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpUser['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ftp User', true), array('controller' => 'ftp_users', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
