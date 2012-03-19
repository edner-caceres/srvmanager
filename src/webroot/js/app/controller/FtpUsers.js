Ext.define('Hosting.controller.FtpUsers', {
    extend: 'Ext.app.Controller',
    stores: [
        'FtpUsers'
    ],
    models: [
        'FtpUser'
    ],
    views: [
        'ftp_user.List',
        'ftp_user.Edit'
    ],
    init: function() {
        this.control({
            'ftpuserlist': {
                itemdblclick: this.editUserFtp,
                itemclick:this.viewFtpUser
            },
            'ftpuseredit button[action=save]': {
                click: this.saveFtpUser
            }

        });
    },

    editUserFtp: function(grid, record) {
        var view = Ext.widget('ftpuseredit');

        view.down('form').loadRecord(record);
    },
    viewFtpUser:function(a, b, c){
        console.log('Actualizar el view');
    },
    saveFtpUser: function(button){
        var win    = button.up('window'),
        form   = win.down('form'),
        record = form.getRecord(),
        values = form.getValues();

        record.set(values);
        win.close();

    }
});