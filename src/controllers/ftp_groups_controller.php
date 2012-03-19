<?php

class FtpGroupsController extends AppController {

    var $name = 'FtpGroups';

    function index() {
        $this->layout = 'ajax';
        $this->FtpGroup->recursive = 0;
        $this->set('ftpGroups', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid ftp group', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('ftpGroup', $this->FtpGroup->read(null, $id));
    }

    function add() {
        $this->layout = 'ajax';
        if (!empty($this->data)) {
            $datos = json_decode(stripslashes($this->data)); //decodificamos la informacion
            $this->data = array('FtpGroup' => (array) $datos);
            if ($this->FtpGroup->save($this->data)) {
                $this->set('guardado', 1);
                //print_r($this->data);
                $this->data['FtpGroup']['id'] = $this->FtpGroup->id;
            } else {
                $this->set('guardado', 0);
            }
        } else {
            $this->set('guardado', 2); // mo se recibieron datos para guardar
        }
    }

    function edit() {
        $this->layout = 'ajax';
        $datos = json_decode(stripslashes($this->data)); //decodificamos la informacion
        $success = false;
        if (count($datos) == 1) { //verificamos si solo se modifico un registro o varios
            $this->data = array('FtpGroup' => (array) $datos);
            $this->data['FtpGroup']['gid'] = $this->data['FtpGroup']['id'];
            if ($this->FtpGroup->save($this->data)) {
                $success = true;
                $this->set('groups', $this->FtpGroup->find('all'));
            }
            $this->set('actualizado', $success);
        } else if (count($datos) >= 2) {
            $resp = array('FtpGroup' => array());
            foreach ($datos as $dato_ftpgroup) {
                $ftp_group = array('FtpGroup' => (array) $dato_ftpgroup);
                $ftp_group['FtpGroup']['gid'] = $ftp_group['FtpGroup']['id'];
                if ($this->FtpGroup->save($ftp_group)) {
                    $success = true;
                    array_push($resp['FtpGroup'], $ftp_group['FtpGroup']);
                }
            }
            $this->data = $resp;
        }
        $this->set('actualizado', $success);
    }

    function delete($id = null) {
        $this->layout = 'ajax';
        $grupo = json_decode(stripslashes($this->data));
        if(count($grupo)==1) {
            $result = $this->FtpGroup->delete($grupo->id);
            $this->set('eliminado', $result);
        } else {
            $result = true;
            foreach ($grupo as $g) {
                $result = ($result and $this->FtpGroup->delete($g->id));
            }
            $this->set('eliminado', $result);
        }
    }

    function admin_index() {
        $this->FtpGroup->recursive = 0;
        $this->set('ftpGroups', $this->paginate());
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid ftp group', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('ftpGroup', $this->FtpGroup->read(null, $id));
    }

    function admin_add() {
        if (!empty($this->data)) {
            $this->FtpGroup->create();
            if ($this->FtpGroup->save($this->data)) {
                $this->Session->setFlash(__('The ftp group has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ftp group could not be saved. Please, try again.', true));
            }
        }
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid ftp group', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->FtpGroup->save($this->data)) {
                $this->Session->setFlash(__('The ftp group has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ftp group could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->FtpGroup->read(null, $id);
        }
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for ftp group', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->FtpGroup->delete($id)) {
            $this->Session->setFlash(__('Ftp group deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Ftp group was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>