<?php

switch ($guardado) {
    case 1: {
            $this->data['FtpGroup']['save'] = 2;
            $respuesta = array(
                'success' => true,
                'mensage' => array(
                    'titulo' => 'Cargo guardado',
                    'msg' => 'El nuevo servidor fue guardado con exito en el catalogo del sistema'
                ),
                'data' => $this->data['FtpGroup']
            );
            print json_encode($respuesta);
        } break;
    case 0: {

            $resultado = array(
                'success' => false,
                'mensage' => array(
                    'titulo' => 'Error al guardar',
                    'msg' => 'El formulario tiene errores, corrijalos y vuelva ha intentarlo'
                ),
                'errors' => $this->validationErrors['FtpGroup']
            );
            print json_encode($resultado);
        } break;
    case 2: {
            $resultado = array(
                'success' => false,
                'mensage' => array(
                    'titulo' => 'Error al guardar',
                    'msg' => 'NO se recibio datos para registrar el servidor'
                ),
                'errors' => array()
            );
            print json_encode($resultado);
        }break;
}
?>