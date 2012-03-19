Ext.define('Hosting.model.FtpUser', {
    extend: 'Ext.data.Model',
    fields: ['id','name', 'email', 'userid', 'gid', 'status', 'expired', 'homedir', 'accessed']
});