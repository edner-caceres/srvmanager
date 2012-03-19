Ext.define('Hosting.store.FtpGroups', {
    extend: 'Ext.data.Store',
    model: 'Hosting.model.FtpGroup',
    autoLoad: true,
    proxy: {
        type: 'ajax',
        method:'POST',
        api: {
            read: 'ftp_groups',
            update: 'ftp_groups/edit',
            create: 'ftp_groups/add',
            destroy: 'ftp_groups/delete'
        },
        reader: {
            type: 'json',
            root: 'data',
            successProperty: 'success',
            totalProperty: 'total'
        },
        writer: {
            type: 'json',
            writeAllFields: true,
            root: 'data',
            encode:true
        }
    }
});