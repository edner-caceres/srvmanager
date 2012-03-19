<div class="ftpQuotaLimits index">
	<h2><?php __('Ftp Quota Limits');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('quota_type');?></th>
			<th><?php echo $this->Paginator->sort('per_session');?></th>
			<th><?php echo $this->Paginator->sort('limit_type');?></th>
			<th><?php echo $this->Paginator->sort('bytes_in_avail');?></th>
			<th><?php echo $this->Paginator->sort('bytes_out_avail');?></th>
			<th><?php echo $this->Paginator->sort('bytes_xfer_avail');?></th>
			<th><?php echo $this->Paginator->sort('files_in_avail');?></th>
			<th><?php echo $this->Paginator->sort('files_out_avail');?></th>
			<th><?php echo $this->Paginator->sort('files_xfer_avail');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ftpQuotaLimits as $ftpQuotaLimit):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $this->Html->link($ftpQuotaLimit['FtpUser']['userid'], array('controller' => 'ftp_users', 'action' => 'view', $ftpQuotaLimit['FtpUser']['id'])); ?>
		</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['quota_type']; ?>&nbsp;</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['per_session']; ?>&nbsp;</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['limit_type']; ?>&nbsp;</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['bytes_in_avail']/1048576; ?>&nbsp;MB</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['bytes_out_avail']; ?>&nbsp;</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['bytes_xfer_avail']; ?>&nbsp;</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['files_in_avail']; ?>&nbsp;</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['files_out_avail']; ?>&nbsp;</td>
		<td><?php echo $ftpQuotaLimit['FtpQuotaLimit']['files_xfer_avail']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ftpQuotaLimit['FtpQuotaLimit']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ftpQuotaLimit['FtpQuotaLimit']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ftpQuotaLimit['FtpQuotaLimit']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpQuotaLimit['FtpQuotaLimit']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< ' . __('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true) . ' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ftp Quota Limit', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('controller' => 'ftp_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('controller' => 'ftp_users', 'action' => 'add')); ?> </li>
	</ul>
</div>