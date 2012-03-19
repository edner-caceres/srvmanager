<?php
$datos = array();
foreach ($ftpUsers as $ftp_user) {
    array_push($datos,$ftp_user['FtpUser']);
}
$respuesta = array(
    'success' => true,
    'total' => count($datos),
    'data' => $datos
);
echo json_encode($respuesta);
?>