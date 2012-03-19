<div class="ftpUsers form">
    <?php echo $this->Form->create('FtpUser'); ?>
    <fieldset>
        <legend><?php __('Change Password for Ftp User - '); echo $this->data['FtpUser']['userid']; ?></legend>
        <?php
            echo $this->Form->input('id');
            echo $this->Form->input('passwd');
            echo $this->Form->input('repasswd');
        ?>
    </fieldset>
    <?php echo $this->Form->end(__('Submit', true)); ?>
</div>
<div class="actions">
        <h3><?php __('Actions'); ?></h3>
        <ul>
            <li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('FtpUser.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('FtpUser.id'))); ?></li>
            <li><?php echo $this->Html->link(__('List Ftp Users', true), array('action' => 'index')); ?></li>
            <li><?php echo $this->Html->link(__('List Ftp Groups', true), array('controller' => 'ftp_groups', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Ftp Group', true), array('controller' => 'ftp_groups', 'action' => 'add')); ?> </li>
            <li><?php echo $this->Html->link(__('List Ftp Quota Limits', true), array('controller' => 'ftp_quota_limits', 'action' => 'index')); ?> </li>
            <li><?php echo $this->Html->link(__('New Ftp Quota Limit', true), array('controller' => 'ftp_quota_limits', 'action' => 'add')); ?> </li>
    </ul>
</div>