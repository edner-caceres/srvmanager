<div class="ftpUsers form">
<?php echo $this->Form->create('FtpUser');?>
	<fieldset>
 		<legend><?php __('Admin Edit Ftp User'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('userid');
		echo $this->Form->input('uid');
		echo $this->Form->input('gid', array('options'=>$ftpGroups));
		echo $this->Form->input('status', array('options'=>array('expired'=>'Cuenta expirada','enable'=>'Cuenta Habilitada','disable'=>'Cuenta Deshabilitada','quota_exeded'=>'Cuenat exedio su cuota de disco')));
		echo $this->Form->input('expired');
		echo $this->Form->input('homedir');
		echo $this->Form->input('shell');
		echo $this->Form->input('count');
		echo $this->Form->input('accessed');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FtpUser.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FtpUser.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ftp Groups', true), array('controller' => 'ftp_groups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Group', true), array('controller' => 'ftp_groups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ftp Quota Limits', true), array('controller' => 'ftp_quota_limits', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp Quota Limit', true), array('controller' => 'ftp_quota_limits', 'action' => 'add')); ?> </li>
	</ul>
</div>