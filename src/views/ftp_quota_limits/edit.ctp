<div class="ftpQuotaLimits form">
<?php echo $this->Form->create('FtpQuotaLimit');?>
	<fieldset>
 		<legend><?php __('Edit Ftp Quota Limit'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('ftp_user_id');
		echo $this->Form->input('name');
		echo $this->Form->input('quota_type', array('options'=>array('user'=> 'Usuario', 'group'=>'Grupo', 'class'=>'Clase','all'=>'Todos')));
		echo $this->Form->input('per_session', array('options'=> array('true'=>'Si', 'false'=>'No')));
		echo $this->Form->input('limit_type', array('options'=> array('soft'=>'Blanda', 'hard'=>'Dura')));
		echo $this->Form->input('bytes_in_avail');
		echo $this->Form->input('bytes_out_avail');
		echo $this->Form->input('bytes_xfer_avail');
		echo $this->Form->input('files_in_avail');
		echo $this->Form->input('files_out_avail');
		echo $this->Form->input('files_xfer_avail');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FtpQuotaLimit.name')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FtpQuotaLimit.name'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ftp Quota Limits', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('controller' => 'ftp_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('controller' => 'ftp_users', 'action' => 'add')); ?> </li>
	</ul>
</div>