<?php
class FtpQuotaLimitsController extends AppController {

	var $name = 'FtpQuotaLimits';

	function index() {
		$this->FtpQuotaLimit->recursive = 0;
		$this->set('ftpQuotaLimits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ftp quota limit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ftpQuotaLimit', $this->FtpQuotaLimit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->FtpQuotaLimit->create();
			if ($this->FtpQuotaLimit->save($this->data)) {
				$this->Session->setFlash(__('The ftp quota limit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ftp quota limit could not be saved. Please, try again.', true));
			}
		}
		$ftpUsers = $this->FtpQuotaLimit->FtpUser->find('list');
		$this->set(compact('ftpUsers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ftp quota limit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FtpQuotaLimit->save($this->data)) {
				$this->Session->setFlash(__('The ftp quota limit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ftp quota limit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FtpQuotaLimit->read(null, $id);
		}
		$ftpUsers = $this->FtpQuotaLimit->FtpUser->find('list');
		$this->set(compact('ftpUsers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ftp quota limit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FtpQuotaLimit->delete($id)) {
			$this->Session->setFlash(__('Ftp quota limit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ftp quota limit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->FtpQuotaLimit->recursive = 0;
		$this->set('ftpQuotaLimits', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ftp quota limit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ftpQuotaLimit', $this->FtpQuotaLimit->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->FtpQuotaLimit->create();
			if ($this->FtpQuotaLimit->save($this->data)) {
				$this->Session->setFlash(__('The ftp quota limit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ftp quota limit could not be saved. Please, try again.', true));
			}
		}
		$ftpUsers = $this->FtpQuotaLimit->FtpUser->find('list');
		$this->set(compact('ftpUsers'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ftp quota limit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->FtpQuotaLimit->save($this->data)) {
				$this->Session->setFlash(__('The ftp quota limit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ftp quota limit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->FtpQuotaLimit->read(null, $id);
		}
		$ftpUsers = $this->FtpQuotaLimit->FtpUser->find('list');
		$this->set(compact('ftpUsers'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ftp quota limit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->FtpQuotaLimit->delete($id)) {
			$this->Session->setFlash(__('Ftp quota limit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ftp quota limit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>