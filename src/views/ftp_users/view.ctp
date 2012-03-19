<div class="ftpUsers view">
<h2><?php  __('Ftp User');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ftp Group'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ftpUser['FtpGroup']['groupname'], array('controller' => 'ftp_groups', 'action' => 'view', $ftpUser['FtpGroup']['gid'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['name']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Email'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['email']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Userid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['userid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Uid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['uid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Gid'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['gid']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Passwd'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['passwd']; ?>
                    <?php echo $this->Html->link('Change password', array('action' => 'change_password', $ftpUser['FtpUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Status'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['status']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Expired'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['expired']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Homedir'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['homedir']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Shell'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['shell']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Count'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['count']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Accessed'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['accessed']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpUser['FtpUser']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ftp User', true), array('action' => 'edit', $ftpUser['FtpUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ftp User', true), array('action' => 'delete', $ftpUser['FtpUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpUser['FtpUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Groups', true), array('controller' => 'ftp_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Group', true), array('controller' => 'ftp_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Quota Limits', true), array('controller' => 'ftp_quota_limits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Quota Limit', true), array('controller' => 'ftp_quota_limits', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php __('Related Ftp Quota Limits');?></h3>
	<?php if (!empty($ftpUser['FtpQuotaLimit'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php __('Id'); ?></th>
		<th><?php __('Ftp User Id'); ?></th>
		<th><?php __('Name'); ?></th>
		<th><?php __('Quota Type'); ?></th>
		<th><?php __('Per Session'); ?></th>
		<th><?php __('Limit Type'); ?></th>
		<th><?php __('Bytes In Avail'); ?></th>
		<th><?php __('Bytes Out Avail'); ?></th>
		<th><?php __('Bytes Xfer Avail'); ?></th>
		<th><?php __('Files In Avail'); ?></th>
		<th><?php __('Files Out Avail'); ?></th>
		<th><?php __('Files Xfer Avail'); ?></th>
		<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($ftpUser['FtpQuotaLimit'] as $ftpQuotaLimit):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $ftpQuotaLimit['id'];?></td>
			<td><?php echo $ftpQuotaLimit['ftp_user_id'];?></td>
			<td><?php echo $ftpQuotaLimit['name'];?></td>
			<td><?php echo $ftpQuotaLimit['quota_type'];?></td>
			<td><?php echo $ftpQuotaLimit['per_session'];?></td>
			<td><?php echo $ftpQuotaLimit['limit_type'];?></td>
			<td><?php echo $ftpQuotaLimit['bytes_in_avail'];?></td>
			<td><?php echo $ftpQuotaLimit['bytes_out_avail'];?></td>
			<td><?php echo $ftpQuotaLimit['bytes_xfer_avail'];?></td>
			<td><?php echo $ftpQuotaLimit['files_in_avail'];?></td>
			<td><?php echo $ftpQuotaLimit['files_out_avail'];?></td>
			<td><?php echo $ftpQuotaLimit['files_xfer_avail'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View', true), array('controller' => 'ftp_quota_limits', 'action' => 'view', $ftpQuotaLimit['name'])); ?>
				<?php echo $this->Html->link(__('Edit', true), array('controller' => 'ftp_quota_limits', 'action' => 'edit', $ftpQuotaLimit['name'])); ?>
				<?php echo $this->Html->link(__('Delete', true), array('controller' => 'ftp_quota_limits', 'action' => 'delete', $ftpQuotaLimit['name']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpQuotaLimit['name'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ftp Quota Limit', true), array('controller' => 'ftp_quota_limits', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
