<div class="ftpGroups form">
<?php echo $this->Form->create('FtpGroup');?>
	<fieldset>
 		<legend><?php __('Admin Add Ftp Group'); ?></legend>
	<?php
		echo $this->Form->input('groupname');
		echo $this->Form->input('members');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ftp Groups', true), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(__('List Ftp Users', true), array('controller' => 'ftp_users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ftp User', true), array('controller' => 'ftp_users', 'action' => 'add')); ?> </li>
	</ul>
</div>