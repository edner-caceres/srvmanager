Ext.define('Hosting.view.ftp_group.List' ,{
    extend: 'Ext.window.Window',
    alias : 'widget.ftpgrouplist',
    layout: 'fit',
    autoShow: true,
    modal:true,
    width: 520,
    height: 415,
    iconCls:'icon-list',
    title: 'Lista de Servidores ',
    initComponent: function() {
        var sm = Ext.create('Ext.selection.CheckboxModel',{
            listeners:{
                'selectionchange': this.selectChange,
                scope: this
            }
        });
        this.listeners = {
            'destroy': function(window, options){
                Ext.data.StoreManager.lookup('FtpGroups').clearFilter();
            },
            'hide': function(window, options){
                Ext.data.StoreManager.lookup('FtpGroups').clearFilter();
            }
        }
        this.items=[{
            id: 'listagrupos',
            singleSelect: true,
            overItemCls: 'x-view-over',
            itemSelector: 'div.thumb-wrap',
            xtype:'dataview',
            store: 'FtpGroups',
            listeners: {
                scope: this,
                selectionchange: this.selectChange
            },
            tpl: [
                // '<div class="details">',
                '<tpl for=".">',
                '<div class="thumb-wrap <tpl if="save == 0">icon-error</tpl> <tpl if="save == 2">icon-ok</tpl>">',
                '<div class="thumb">',
                (!Ext.isIE6? '<img src="img/ftp/generic_server.png" />' : '<div style="width:74px;height:74px;filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src=\'img/ftp/generic_server.png\')"></div>'),
                '</div>',
                '<span>{groupname}</span>',
                '</div>',
                '</tpl>'
                // '</div>'
            ]
        }];
        
        this.tbar =[{
            title: 'Acciones',
            xtype: 'buttongroup',
            columns: 3,
            items:[{
                xtype: 'buttongroup',
                items:{
                    scale: 'large',
                    text: 'Registrar',
                    action: 'addserver',
                    iconAlign: 'top',
                    iconCls: 'icon-add-server'
                }
            },{
                xtype: 'buttongroup',
                defaults:{
                    scale: 'large',
                    iconAlign: 'top'
                },
                items:[{
                    text: 'Modificar',
                    iconCls: 'icon-edit-server',
                    action: 'editserver',
                    disabled:true
                },{
                    text: 'Eliminar',
                    iconCls:'icon-delete-server',
                    action:'deleteserver',
                    disabled:true
                }]
            },{
                xtype: 'buttongroup',
                items:{
                    scale: 'large',
                    text: 'Sincronizar',
                    action: 'syncdata',
                    iconAlign: 'top',
                    iconCls: 'icon-refresh-aux'
                }
            }]
        },{
            title: 'Reportes',
            xtype: 'buttongroup',
            columns: 4,
            defaults:{
                scale: 'large',
                iconAlign: 'top'
            },
            items:[{
                xtype: 'buttongroup',
                defaults:{
                    scale: 'large',
                    iconAlign: 'top'
                },
                items:[{
                    text: 'Informaci&oacute;n',
                    iconCls: 'icon-information-server',
                    action:'infoserver',
                    disabled:true
                },{
                    text: 'Estadisticas',
                    iconCls: 'icon-statistics-server',
                    action:'statisticsserver',
                    disabled:true
                },{
                    text: 'Visor de eventos',
                    iconCls:'icon-diagnosis-server',
                    action:'eventviewerserver',
                    disabled:true
                }]
            }]
        }];
        this.bbar=[{
            xtype: 'combo',
            fieldLabel: 'Ordenar por',
            labelWidth: 70,
            valueField: 'field',
            displayField: 'label',
            editable: false,
            width:170,
            store: Ext.create('Ext.data.Store', {
                fields: ['field', 'label'],
                sorters: 'type',
                proxy : {
                    type: 'memory',
                    data  : [{
                        label: 'Nombre',
                        field: 'groupname'
                    }, {
                        label: 'Tipo',
                        field: 'type'
                    }]
                }
            }),
            value: 'type',
            listeners: {
                scope : this,
                select: this.sort
            }
        }, '-',{
            xtype: 'textfield',
            name : 'filter',
            fieldLabel: 'Buscar',
            labelWidth: 40,
            listeners: {
                scope : this,
                buffer: 50,
                change: this.filter
            } 
        }];
        this.callParent(arguments);
    },

    filter: function(field, newValue) {
        var store = this.down('dataview').store,
        dataview = this.down('dataview');
        store.suspendEvents();
        store.clearFilter();
        dataview.getSelectionModel().clearSelections();
        store.resumeEvents();
        store.filter({
            property: 'groupname',
            anyMatch: true,
            value   : newValue
        });
    },

    sort: function() {
        var field = this.down('combobox').getValue();
        this.down('dataview').store.sort(field, 'ASC');
    },

    selectChange: function(dataview, selections ){
        var bedit = this.down('button[action=editserver]');
        var bdelete = this.down('button[action=deleteserver]');
        var bdinfo = this.down('button[action=infoserver]');
        var bdviewer = this.down('button[action=eventviewerserver]');
        var bdstatistic = this.down('button[action=statisticsserver]');
        if(selections.length > 0){
            bdelete.enable();
            bdstatistic.enable();
            if(selections.length == 1){
                bedit.enable();
                bdinfo.enable();
                bdviewer.enable()
            }else{
                bedit.disable();
                bdinfo.disable();
                bdviewer.disable()
            }
        }else{
            bedit.disable();
            bdelete.disable();
            bdinfo.disable();
            bdviewer.disable();
            bdstatistic.disable();
        }
    }

});