<?php

class FtpUsersController extends AppController {

    var $name = 'FtpUsers';

    function index() {
        $this->layout='ajax';
        $this->FtpUser->recursive = 0;
        $this->set('ftpUsers', $this->paginate());
    }

    function view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid ftp user', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('ftpUser', $this->FtpUser->read(null, $id));
    }

    function add() {
        if (!empty($this->data)) {
            $this->FtpUser->create();
            if ($this->FtpUser->save($this->data)) {
                //encriptamos la contraseña paar que proftpd lo pueda autenticar
                $pass_encrypt = $this->FtpUser->query("SELECT ENCRYPT('" . $this->data['FtpUser']['passwd'] . "') as password");
                $password = $pass_encrypt[0][0]['password'];
                $this->FtpUser->saveField('passwd', $password);

                // preguntamos por las bases de datos
                if (!empty($this->data['FtpUser']['create_data_bases'])) {
                    foreach ($this->data['FtpUser']['create_data_bases'] as $value) {
                        if ($value == 'mysql') {
                            $res = $this->FtpUser->query("CREATE DATABASE db_" . $this->data['FtpUser']['userid'] . ";");
                            $res = $res and $this->FtpUser->query("GRANT ALL PRIVILEGES ON db_" . $this->data['FtpUser']['userid'] . ".* to " . $this->data['FtpUser']['userid'] . "@localhost IDENTIFIED BY '" . $this->data['FtpUser']['passwd'] . "';");
                        } elseif ($value == 'postgres') {
                            
                        }
                    }
                    if (!$res)
                        $this->Session->setFlash(__('Can´t create database. Please create manually a database', true));
                }
                $this->Session->setFlash(__('The ftp user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ftp user could not be saved. Please, try again.', true));
            }
        }
        $ftpGroups = $this->FtpUser->FtpGroup->find('list');
        $this->set(compact('ftpGroups'));
    }

    function edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid ftp user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->FtpUser->save($this->data)) {
                $this->Session->setFlash(__('The ftp user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ftp user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->FtpUser->read(null, $id);
            $this->data['FtpUser']['passwd'] = '';
        }
        $ftpGroups = $this->FtpUser->FtpGroup->find('list');
        $this->set(compact('ftpGroups'));
    }

    function delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for ftp user', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->FtpUser->delete($id)) {
            $this->Session->setFlash(__('Ftp user deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Ftp user was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

    function change_password($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid ftp user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            $pass_encrypt = $this->FtpUser->query("SELECT ENCRYPT('" . $this->data['FtpUser']['passwd'] . "') as password");
            print_r($pass_encrypt);
            if (!empty($pass_encrypt[0][0]['password'])) {
                $this->data['FtpUser']['passwd'] = $pass_encrypt[0][0]['password'];
                if ($this->FtpUser->save($this->data)) {
                    $this->Session->setFlash(__('The ftp user has been saved', true));
                    $this->redirect(array('action' => 'index'));
                } else {
                    $this->Session->setFlash(__('The ftp user could not be saved. Please, try again.', true));
                }
            } else {
                $this->Session->setFlash(__('Error al encryptar el password mysql no soporta la funcion encrypt(). Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->FtpUser->read(null, $id);
            $this->data['FtpUser']['passwd'] = '';
        }
        $ftpGroups = $this->FtpUser->FtpGroup->find('list');
        $this->set(compact('ftpGroups'));
    }

    function admin_index() {
        $this->FtpUser->recursive = 0;
        $this->set('ftpUsers', $this->paginate());
    }

    function admin_view($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid ftp user', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->set('ftpUser', $this->FtpUser->read(null, $id));
    }

    function admin_add() {
        if (!empty($this->data)) {
            $this->FtpUser->create();
            if ($this->FtpUser->save($this->data)) {
                $this->Session->setFlash(__('The ftp user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ftp user could not be saved. Please, try again.', true));
            }
        }
        $ftpGroups = $this->FtpUser->FtpGroup->find('list');
        $this->set(compact('ftpGroups'));
    }

    function admin_edit($id = null) {
        if (!$id && empty($this->data)) {
            $this->Session->setFlash(__('Invalid ftp user', true));
            $this->redirect(array('action' => 'index'));
        }
        if (!empty($this->data)) {
            if ($this->FtpUser->save($this->data)) {
                $this->Session->setFlash(__('The ftp user has been saved', true));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The ftp user could not be saved. Please, try again.', true));
            }
        }
        if (empty($this->data)) {
            $this->data = $this->FtpUser->read(null, $id);
        }
        $ftpGroups = $this->FtpUser->FtpGroup->find('list');
        $this->set(compact('ftpGroups'));
    }

    function admin_delete($id = null) {
        if (!$id) {
            $this->Session->setFlash(__('Invalid id for ftp user', true));
            $this->redirect(array('action' => 'index'));
        }
        if ($this->FtpUser->delete($id)) {
            $this->Session->setFlash(__('Ftp user deleted', true));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Ftp user was not deleted', true));
        $this->redirect(array('action' => 'index'));
    }

}

?>