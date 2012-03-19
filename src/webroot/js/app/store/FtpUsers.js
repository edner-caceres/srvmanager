Ext.define('Hosting.store.FtpUsers', {
    extend: 'Ext.data.Store',
    model: 'Hosting.model.FtpUser',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        api: {
            read: 'ftp_users',
            update: 'ftp_users/edit'
        },
        reader: {
            type: 'json',
            root: 'data',
            successProperty: 'success',
            totalProperty: 'total'
        }
    }
});