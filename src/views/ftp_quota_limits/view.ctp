<div class="ftpQuotaLimits view">
<h2><?php  __('Ftp Quota Limit');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ftp User Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['ftp_user_id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Ftp User'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($ftpQuotaLimit['FtpUser']['userid'], array('controller' => 'ftp_users', 'action' => 'view', $ftpQuotaLimit['FtpUser']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Quota Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['quota_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Per Session'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['per_session']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Limit Type'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['limit_type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bytes In Avail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['bytes_in_avail']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bytes Out Avail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['bytes_out_avail']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Bytes Xfer Avail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['bytes_xfer_avail']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Files In Avail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['files_in_avail']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Files Out Avail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['files_out_avail']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Files Xfer Avail'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $ftpQuotaLimit['FtpQuotaLimit']['files_xfer_avail']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ftp Quota Limit', true), array('action' => 'edit', $ftpQuotaLimit['FtpQuotaLimit']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Delete Ftp Quota Limit', true), array('action' => 'delete', $ftpQuotaLimit['FtpQuotaLimit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpQuotaLimit['FtpQuotaLimit']['name'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Quota Limits', true), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Quota Limit', true), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('controller' => 'ftp_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('controller' => 'ftp_users', 'action' => 'add')); ?> </li>
	</ul>
</div>
