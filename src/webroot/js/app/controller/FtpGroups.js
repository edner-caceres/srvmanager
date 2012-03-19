Ext.define('Hosting.controller.FtpGroups', {
    extend: 'Ext.app.Controller',
    stores: [
        'FtpGroups'
    ],
    models: [
        'FtpGroup'
    ],
    views: [
        'ftp_group.List',
        'ftp_group.Add'
    ],
    requires:[
        'Ext.window.MessageBox',
        'Ext.tip.*'
    ],
    init: function() {
        
        this.control({
            'ftpgrouplist button[action=addserver]': {
                click: this.addFtpGroup
            },
            'ftpgrouplist button[action=editserver]': {
                click: this.editFtpGroup
            },
            'ftpgrouplist #listagrupos': {
                itemdblclick: this.editFtpGroup
            },
            'ftpgrouplist button[action=deleteserver]': {
                click: this.deleteFtpGroup
            },
            'ftpgrouplist button[action=syncdata]': {
                click: this.syncFtpGroup
            },
            'ftpgrouplist button[action=infoserver]': {
                click: this.infoFtpGroup
            },
            'ftpgrouplist button[action=statisticsserver]': {
                click: this.statisticFtpGroup
            },
            'ftpgrouplist button[action=eventviewerserver]': {
                click: this.viewFtpGroup
            },
            'ftpgroupadd button[action=save]': {
                click: this.saveFtpGroup
            }
        });
    },
    addFtpGroup: function(button){
        Ext.widget('ftpgroupadd');

    },
    viewFtpGroup:function(a, b, c){
        console.log('Visor de eventos del servidor');
    },
    editFtpGroup: function(source, record){
        if(source.getXType() == 'button'){
            var win = source.up('window');
            record = win.down('#listagrupos').getSelectionModel().getSelection();
            record = record[0];
        }
        var view = Ext.widget('ftpgroupadd');
        view.down('form').loadRecord(record);

    },
    deleteFtpGroup: function(button){
        Ext.MessageBox.confirm(
            'Eliminar Servidores',
            'Esta seguro que desea eliminar los sercvidores seleccionados',
            function(confirm){
                if(confirm == 'yes'){
                    var win = button.up('window');
                    var seleccion = win.down('#listagrupos').getSelectionModel().getSelection();
                    this.getFtpGroupsStore().remove(seleccion);
                    this.getFtpGroupsStore().sync();
                }
            },
            this
            );
    },
    syncFtpGroup: function(){
        this.getFtpGroupsStore().sync();
    },
    saveFtpGroup: function(button){
        var win    = button.up('window');
        var form   = win.down('form');
        if(form.getForm().isValid()){
            var record = form.getRecord();
            var values = form.getValues();
            if(!record){
                record = this.getFtpGroupModel().create();
                record.set(values);
                this.getFtpGroupsStore().insert(0, record);
            }else{
                record.set(values);
            }
        
            win.close();
            this.getFtpGroupsStore().sync();
        }
    },
    infoFtpGroup: function(){
        Ext.create('Ext.window.Window', {
            title: 'Hello',
            height: 200,
            width: 400,
            layout: 'fit',
            headerPosition: 'bottom',
            items: {  // Let's put an empty grid in just to illustrate fit layout
                xtype: 'grid',
                border: false,
                columns: [{
                    header: 'World'
                }],                 // One header just for show. There's no data,
                store: Ext.create('Ext.data.ArrayStore', {}) // A dummy empty data store
            }
        }).show();
    },
    statisticFtpGroup: function(){
        console.log('Stadisticas del servidor');
    }

});