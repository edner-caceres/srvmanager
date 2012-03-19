<?php
class FtpQuotaLimit extends AppModel {
	var $name = 'FtpQuotaLimit';
	var $displayField = 'name';
	var $validate = array(
		'ftp_user_id' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'La cuota tiene que pertenecer a un usuario'
			),
		),
		'name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'El nombre de usuario no puede ser en blanco'
			),
		),
		'quota_type' => array(
			'inlist' => array(
				'rule' => array('inlist', array('user', 'group', 'class','all')),
				'message' => 'Seleccione cuota de usuario, grupo, clase o todas'
			),
		),
		'per_session' => array(
			'inlist' => array(
				'rule' => array('inlist', array('true', 'false')),
				'message' => 'Si o No. "Si" significa el límite de cuota son válidos sólo para una sesión. Por ejemplo, si el usuario tiene una cuota de 15 MB, y ha subido 15 MB durante la sesión actual, entonces no puede cargar nada más. Sin embargo, si cierra la sesión y de nuevo, otra vez tiene 15 MB de espacio disponible. Medio falsa, de que el usuario tiene 15 MB de los casos, sin importar si se cierra la sesión y otra vez.'
			),
		),
		'limit_type' => array(
			'inlist' => array(
				'rule' => array('inlist', array('soft', 'hard')),
				'message' => 'Un límite de cuota es un duro nunca a superar el límite, mientras que una cuota blanda puede superar de forma temporal. Normalmente se utiliza duro aquí.'
			),
		),
		'bytes_in_avail' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Límite de subida en bytes (por ejemplo, 15.728.640 de 15 MB). 0 significa ilimitado.'
			),
		),
		'bytes_out_avail' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Límite de subida en bytes (por ejemplo, 15.728.640 de 15 MB). 0 significa ilimitado.'
			),
		),
		'bytes_xfer_avail' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'límite de transferencia de bytes. La suma de las cargas y descargas de un usuario se le permite hacer. 0 significa ilimitado.'
			),
		),
		'files_in_avail' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Límite de subida de archivos. 0 significa ilimitado.'
			),
		),
		'files_out_avail' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Límite de descarga de archivos. 0 significa ilimitado.'
			),
		),
		'files_xfer_avail' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'límite de Traslado de archivos. 0 significa ilimitado.'
				
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'FtpUser' => array(
			'className' => 'FtpUser',
			'foreignKey' => 'ftp_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>