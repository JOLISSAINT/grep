<?php
//Controlleur Series

class SeriesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	
	//ajout d'une nouvelle serie
	public function add() {	
		$this->loadModel('Serie');
		if ($this->request->is('post')) {
            $this->Serie->create();
			// stockage du $session dans une variable
			$lieuDirection = $this->Session->read('Lieu.direction');
            if ($this->Serie->save($this->request->data)) {
                $this->Session->setFlash(__('La serie a ete sauvegarde'));
					// test redirection après création d'une série
					return $this->redirect(array('controller' => 'tournaments', 'action' => 'index'));
            } else {
                $this->Session->setFlash(__('La serie n\'a pas ete sauvegardee. Merci de reessayer.'));
            }
        }
    }
	
}
?>