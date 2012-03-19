<?php

if($actualizado) {    
    $lista_grupos = array();
    foreach ($groups as $grupo) {
        $grupo['FtpGroup']['id']=$grupo['FtpGroup']['gid'];
        unset($grupo['FtpGroup']['gid']);
        array_push($lista_grupos, $grupo['FtpGroup']);
    }
    $respuesta = array(
        'success' => $actualizado,
        'data'=>$lista_grupos
    );
}else {
    $respuesta = array(
        'success'=> $actualizado,
        'mensage'=> array(
            'titulo'=> 'Error al guardar',
            'msg'=> 'El formulario tiene errores, corrijalos y vuelva ha intentarlo'
        ),
        'errors' => $this->validationErrors['FtpGroup']
    );
}
echo json_encode($respuesta);
?>