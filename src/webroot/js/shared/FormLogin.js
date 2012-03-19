Ext.define('com.labinfsis.FormLogin',{
    extend: 'Ext.Window',
    requires: [
        'Ext.menu.Menu',
        'Ext.Button',
        'Ext.form.Panel'
    ],
    title: 'Introduzca sus credenciales para ingresar',
    width: 420,
    height: 300,
    layout: 'border',
    closable: false,
    modal:true,
    iconCls: 'seguridad',
    sessionIniciada: false,
    resizable :false,
    constructor: function(config){
        this.addEvents('sessionstart', 'sessionclose', 'sessionlost');
        this.menu = Ext.create('Ext.Button',{
            text: 'Iniciar session',
            width: 100,
            iconCls: 'icon-offline',
            handler: function(boton, evento){
                if(this.sessionIniciada){
                    this.menu_usuario.show('menu', "tl-bl?");
                }else{
                    this.iniciarSession();
                }

            }.createDelegate(this),
            renderTo:'menu'
        });
        this.menu_usuario = Ext.create('Ext.menu.Menu',{
            items:[{
                text: 'Informacion personal',
                iconCls: 'icon-usuario'
            },{
                text: 'Cambiar Contrase&ntilde;a',
                iconCls: 'icon-pass-edit'
            },'-',{
                text: 'Salir',
                iconCls: 'icon-salir',
                handler: function(){
                    this.menu.setText('Iniciar session');
                    this.menu.setIconClass('icon-offline');
                    this.fireEvent('sessionclose');
                    this.sessionIniciada = false;
                }.createDelegate(this)
            }]
        });
        this.formLogin = new Ext.form.FormPanel({
            region: 'center',
            labelWidth: 120,
            labelAlign:'right',
            border:false,
            buttonAlign: 'center',
            cls: 'logo-login',
            monitorValid: true,
            //waitMsgTarget: true,
            bodyStyle: 'background: transparent',
            defaults:{
                xtype: 'textfield',
                allowBlank: false,
                cls: 'grande',
                itemCls: 'cod',
                height: 26
            },
            items:[{
                id: 'data[Cuenta][nombre_cuenta]',
                fieldLabel: '<b>Usuario</b>'
            },{
                //id: 'data[Cuenta][password]',
                name: 'pass',
                inputType: 'password',
                fieldLabel: '<b>Contrase&ntilde;a</b>',
                listeners: {
                    specialkey: function(field, e){
                        if (e.getKey() == e.ENTER) {
                            this.login('cuentas/login');
                        }
                    }.createDelegate(this)
                }
            }],
            buttons : [{
                text:'<em class="grande">Ingresar</em>',
                scale: 'large',
                formBind: true,
                handler: function(){
                    this.login('cuentas/login');
                }.createDelegate(this)
            },{
                text:'<em class="grande">Cancelar</em>',
                scale: 'large',
                handler: function(){
                    this.hide();
                }.createDelegate(this)
            }]
        });
        var conf = {
            items :[{
                region: 'north',
                html: '<div id="cabecera"><div class="fondo-login-institucion"><h1>Universidad Mayor de San Simon</h1><h2>Departamento de Informatica</h2><h3>Sistema de Administracion Integrado - LABINFSIS</h3></div></div>',
                height: '70'
            },this.formLogin],
            bbar: ['Ingrese credenciales','->','<b>&copy; 2010 - LABINFSIS</b>']
        };
        Ext.applyIf(this,conf);
        com.labinfsis.FormLogin.superclass.constructor.call(this);
    },
    login: function(url_login){
        if(this.formLogin.getForm().isValid()){
            this.formLogin.getForm().submit({
                url: url_login,
                waitTitle:'Comprobando',
                waitMsg:'Comprobando credenciales...',
                success: function(form, action){
                    var respuesta = Ext.util.JSON.decode(action.response.responseText);
                    Ext.labinfsis.msg(respuesta.mensage.titulo, respuesta.mensage.msg, Ext.getBody(), 'message');
                    this.menu.setText(respuesta.usuario.rol + ' - ' + respuesta.usuario.nombre);
                    this.menu.setIconClass('icon-online');
                    this.sessionIniciada = true;
                    this.hide();
                    this.formLogin.getForm().reset();
                    this.fireEvent('sessionstart');
                }.createDelegate(this),
                failure:function(form, action){
                    if(action.response.status == 200){
                        var respuesta = Ext.util.JSON.decode(action.response.responseText);
                        Ext.labinfsis.msg(respuesta.mensage.titulo, respuesta.mensage.msg, 'cabecera', 'error');
                    }else{
                        Ext.MessageBox.show({
                            title: '<b style="color:#F00">ERROR</b>',
                            msg: action.response.statusText,
                            buttons: Ext.MessageBox.OK,
                            icon: Ext.MessageBox.ERROR
                        });
                    }

                }.createDelegate(this)
            });
        }else{
            Ext.labinfsis.msg('El formulario tiene errores', 'El formulario de inicio de session tiene errores, corrijalos y vuelva a intentar', 'cabecera', 'error');
        }
    },
    iniciarSession: function(){
        this.show('menu');
    }	
});