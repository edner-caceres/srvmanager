<div class="ftpGroups index">
	<h2><?php __('Ftp Groups');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('groupname');?></th>
			<th><?php echo $this->Paginator->sort('gid');?></th>
			<th><?php echo $this->Paginator->sort('members');?></th>
			<th><?php echo $this->Paginator->sort('description');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($ftpGroups as $ftpGroup):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $ftpGroup['FtpGroup']['groupname']; ?>&nbsp;</td>
		<td><?php echo $ftpGroup['FtpGroup']['gid']; ?>&nbsp;</td>
		<td><?php echo $ftpGroup['FtpGroup']['members']; ?>&nbsp;</td>
		<td><?php echo $ftpGroup['FtpGroup']['description']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View', true), array('action' => 'view', $ftpGroup['FtpGroup']['gid'])); ?>
			<?php echo $this->Html->link(__('Edit', true), array('action' => 'edit', $ftpGroup['FtpGroup']['gid'])); ?>
			<?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $ftpGroup['FtpGroup']['gid']), null, sprintf(__('Are you sure you want to delete # %s?', true), $ftpGroup['FtpGroup']['gid'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ftp Group', true), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('controller' => 'ftp_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('controller' => 'ftp_users', 'action' => 'add')); ?> </li>
	</ul>
</div>