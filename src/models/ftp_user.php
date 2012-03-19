<?php

class FtpUser extends AppModel {

    var $name = 'FtpUser';
    var $displayField = 'userid';
    var $validate = array(
        'name' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'El nombre del dueño de la cuenta es necesario'
            ),
            'unico' => array(
                'rule' => 'isUnique',
                'message' => 'El nombre descriptivo ya esta registrado'
            )
        ),
        'email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'El correo electronico es necesario'
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Debe de ingresar un correo en formato usuario@dominio.com'
            ),
        ),
        'userid' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'El nombre de usuario es necesario'
            ),
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'message' => 'El nombre de usaurio no debe de contener espacios ni caracteres especiales'
            ),
            'unico' => array(
                'rule' => 'isUnique',
                'message' => 'El nombre de usuario ya esta registrado'
            )
        ),
        'gid' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'El usuario tiene que pertenecer a un grupo'
            ),
        ),
        'passwd' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'La contraseña es necesaria'
            ),
        ),
        'status' => array(
            'inlist' => array(
                'rule' => array('inList', array('expired', 'enable', 'disable', 'quota_exeded')),
                'message' => 'Seleccione uno de los valores expired, enable, disable, quota_exeded'
            ),
        ),
        'expired' => array(
            'date' => array(
                'rule' => array('date'),
                'message' => 'No es un formato valido para la fecha'
            ),
        ),
        'homedir' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'El directorio de trabajo es necesario'
            ),
        )
    );
    //The Associations below have been created with all possible keys, those that are not needed can be removed
    var $belongsTo = array(
        'FtpGroup' => array(
            'className' => 'FtpGroup',
            'foreignKey' => 'gid',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );
    var $hasMany = array(
        'FtpQuotaLimit' => array(
            'className' => 'FtpQuotaLimit',
            'foreignKey' => 'ftp_user_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );

}

?>