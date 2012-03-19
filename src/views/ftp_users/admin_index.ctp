<div class="ftpUsers index">
	<h2><?php __('Ftp Users');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('userid');?></th>
			<th><?php echo $this->Paginator->sort('uid');?></th>
			<th><?php echo $this->Paginator->sort('gid');?></th>
			<th><?php echo $this->Paginator->sort('passwd');?></th>
			<th><?php echo $this->Paginator->sort('status');?></th>
			<th><?php echo $this->Paginator->sort('expired');?></th>
			<th><?php echo $this->Paginator->sort('homedir');?></th>
			<th><?php echo $this->Paginator->sort('shell');?></th>
			<th><?php echo $this->Paginator->sort('count');?></th>
			<th><?php echo $this->Paginator->sort('accessed');?></th>
			<th><?php echo $this->Paginator->sort('modified');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ftpUsers as $ftpUser):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $ftpUser['FtpUser']['id']; ?>&nbsp;</td>		
		<td><?php echo $ftpUser['FtpUser']['name']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['email']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['userid']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['uid']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ftpUser['FtpGroup']['groupname'], array('controller' => 'ftp_groups', 'action' => 'view', $ftpUser['FtpGroup']['gid'])); ?>
		</td>
		<td><?php echo $ftpUser['FtpUser']['passwd']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['status']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['expired']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['homedir']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['shell']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['count']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['accessed']; ?>&nbsp;</td>
		<td><?php echo $ftpUser['FtpUser']['modified']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ftpUser['FtpUser']['id'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ftpUser['FtpUser']['id'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ftpUser['FtpUser']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpUser['FtpUser']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ftp Groups', true), array('controller' => 'ftp_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Group', true), array('controller' => 'ftp_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Quota Limits', true), array('controller' => 'ftp_quota_limits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Quota Limit', true), array('controller' => 'ftp_quota_limits', 'action' => 'add')); ?> </li>
	</ul>
</div>