<?php
$datos = array();
foreach ($ftpGroups as $ftp_group) {
    $ftp_group['FtpGroup']['id']=$ftp_group['FtpGroup']['gid'];
    $ftp_group['FtpGroup']['save']=1;
    array_push($datos,$ftp_group['FtpGroup']);
}
$respuesta = array(
    'success' => true,
    'total' => count($datos),
    'data' => $datos
);
echo json_encode($respuesta);
?>
