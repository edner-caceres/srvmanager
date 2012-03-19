<?php
class FtpGroup extends AppModel {
	var $name = 'FtpGroup';
	var $primaryKey = 'gid';
	var $displayField = 'groupname';
	var $validate = array(
		'groupname' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Este campo es obligatorio'
			),
			'alphanumeric' => array(
				'rule' => array('alphanumeric'),
				'message' => 'No se permite espacios en el nombre del grupo'
			),
		),
		'members' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Es necesario por lo menos un miembro'
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'FtpUser' => array(
			'className' => 'FtpUser',
			'foreignKey' => 'gid',
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