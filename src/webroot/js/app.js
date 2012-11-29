Ext.Loader.setConfig({
    enabled: true
});
Ext.Loader.setPath('Ext.ux', '../libs/extjs-4.1.1/examples/ux');
Ext.application({
    name: 'Hosting',
    appFolder: 'js/app',
    controllers: [
        'FtpUsers',
        'FtpGroups'
    ],
    listGroups: function(){
        var groups = Ext.widget('ftpgrouplist');
        groups.show();
    },
    launch: function() {
        var panel_inicio = Ext.create('Ext.Panel',{
            id: 'home',
            iconCls: 'icon-home',
            title: 'Dashboard',
            contentEl:'main_container',
            bodyStyle: 'background-color: transparent',
            autoScroll: true
        });
        var panel_ftp=Ext.create('Ext.Panel',{
            title: 'Usuarios FTP',
            layout: 'border',
            items:[{
                    xtype:'ftpuserlist',
                    region:'center'
            },{
                title: 'Detalle de la cuenta seleccionada',
                collapsible: true,
                region:'east',
                html:'Detalle de la cuenta esto sera un user_ftp.View',
                width:400,
                margins: '0 0 5 5'

            }],
            tbar:[{
                title: 'Acciones',
                xtype: 'buttongroup',
                columns: 3,
                items:[{
                    xtype: 'buttongroup',
                    items:{
                        scale: 'large',                        
                        text: 'Registrar',
                        iconAlign: 'top',
                        iconCls: 'icon-add-aux'
                    }
                },{
                    xtype: 'buttongroup',
                    items:[{
                        id: 'editar',
                        text: 'Modificar',
                        scale: 'large',
                        iconAlign: 'top',                        
                        iconCls: 'icon-edit-aux'
                    },{
                        id: 'eliminar',
                        text: 'Eliminar',
                        iconCls:'icon-delete-aux',
                        scale: 'large',
                        iconAlign: 'top'
                    }]
                },{
                    xtype: 'buttongroup',
                    defaults:{
                        scale: 'large',
                        iconAlign: 'top'
                    },
                    items:[{
                        text: 'Buscar',                        
                        iconCls: 'icon-buscar-aux'
                    },{

                        text: 'Ordenar',
                        iconCls:'icon-ordenar-aux',
                        handler: this.listGroups
                    }]
                }]
            },{
                title: 'Configuracion de fuente de datos',
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
                        text: 'Gestiones',                        
                        iconCls: 'icon-gestion-32'
                    },{
                        text: 'Turnos',
                        iconCls: 'icon-turno-32'
                    },{
                        text: 'Unidades',
                        iconCls:'icon-unidad-32'
                    }, {
                        text: 'Cargos',
                        iconCls:'icon-cargos-32'

                    }]
                }]
            }]
        });
        var panel_principal = Ext.create('Ext.tab.Panel',{
            activeItem: 'ftp-user-list',
            region: 'center',
            id: 'main',
            items:[panel_inicio, panel_ftp]
        });

        Ext.create('Ext.container.Viewport', {
            layout: 'border',
            items: [{
                contentEl: 'header',
                region:'north',
                height: 40
            },panel_principal,{
                contentEl: 'footer',
                border: false,
                region:'south'
            }]
        });
    }
});