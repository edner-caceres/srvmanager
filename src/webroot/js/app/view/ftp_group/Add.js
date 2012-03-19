Ext.define('Hosting.view.ftp_group.Add', {
    extend: 'Ext.window.Window',
    alias : 'widget.ftpgroupadd',
    title : 'Registrar servidor',
    layout: 'fit',
    autoShow: true,
    modal:true,
    width: 550,
    requires:[
    'Ext.ux.form.MultiSelect',
    'Ext.ux.form.ItemSelector'
    ],
    iconCls: 'icon-add',
    initComponent: function() {
        this.items = [{
            xtype: 'form',
            border:false,
            bodyStyle: 'padding:10px; background-color:#DFE9F6',
            fieldDefaults: {
                labelAlign: 'top'
            },
            items: [{
                name:'id',
                xtype: 'hidden'
            },{
                xtype: 'container',
                layout:'column',                
                items:[{
                    xtype: 'container',
                    columnWidth:.65,
                    layout: 'anchor',
                    items: [{
                        xtype: 'textfield',
                        name : 'groupname',
                        fieldLabel: 'Identificador',
                        msgTarget: 'side',
                        allowBlank: false,
                        anchor:'95%'
                    }]
                },{
                    xtype: 'container',
                    columnWidth:.35,
                    layout: 'anchor',
                    items: [{
                        xtype: 'combo',
                        fieldLabel: 'Funcionalidad',
                        valueField: 'field',
                        displayField: 'label',
                        value: 'mail',
                        editable: false,
                        store: Ext.create('Ext.data.Store', {
                            fields: ['field', 'label'],
                            proxy : {
                                type: 'memory',
                                data  : [{
                                    label: 'Servidor de Correo',
                                    field: 'mail'
                                }, {
                                    label: 'Servidor de Archivos',
                                    field: 'samba'
                                }, {
                                    label: 'Servidor Ftp',
                                    field: 'ftp'
                                }, {
                                    label: 'Servidor de Base de Datos(PostgreSQL)',
                                    field: 'postgresql'
                                }, {
                                    label: 'Servidor de Base de Datos(MySQL)',
                                    field: 'mysql'
                                }, {
                                    label: 'Servidor de Proxy',
                                    field: 'proxy'
                                }]
                            }
                        })
                    }]
                }]
            },{
                xtype: 'fieldcontainer',
                fieldLabel: 'Direccion IP del Servidor',
                combineErrors: true,
                msgTarget: 'side',
                layout: 'hbox',
                anchor:'90%',
                defaults: {
                    flex: 1,
                    hideLabel: true
                },
                items: [{
                    xtype: 'textfield',
                    fieldLabel: 'XXX',
                    name: 'xxx-1',
                    width: 29,
                    allowBlank: false
                },{
                    xtype: 'displayfield',
                    value: '.'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'XXX',
                    name: 'xxx-2',
                    width: 29,
                    allowBlank: false,
                    margins: '0 5 0 0'
                },{
                    xtype: 'displayfield',
                    value: '.'
                },{
                    xtype: 'textfield',
                    fieldLabel: 'XXX',
                    name: 'xxx-3',
                    width: 29,
                    allowBlank: false
                },{
                    xtype: 'displayfield',
                    value: ':'

                },{
                    xtype: 'textfield',
                    fieldLabel: 'Puerto',
                    name: 'port',
                    width: 29,
                    allowBlank: false
                }]
            },{
                xtype: 'textfield',
                name : 'description',
                fieldLabel: '<br />Nombre del servidor',
                msgTarget: 'side',
                allowBlank: false,
                anchor:'100%'
            },{
                anchor: '100%',
                xtype: 'itemselector',
                buttons:['add', 'remove'],
                msgTarget: 'side',
                name : 'members',
                fieldLabel: '<br />Seleccione el o los usuarios que tienen habilitada(s) su(s) cuenta(s) en este servidor',
                allowBlank: false,
                store: Ext.data.StoreManager.lookup('FtpUsers'),
                displayField: 'userid',
                valueField:'id'
            }]
        }];

        this.buttons = [{
            text: 'Save',
            action: 'save',
            iconCls:'icon-guardar'
        },{
            text: 'Cancel',
            scope: this,
            handler: this.close,
            iconCls:'icon-cancelar'
        }];

        this.callParent(arguments);
    }
});