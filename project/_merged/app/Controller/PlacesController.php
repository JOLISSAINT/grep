<?php

//define('createPlaceTournament', 1);
//define('createPlace', 0);

//Controlleur Place

class PlacesController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	
	public function index() {
		// $session permettant de rediriger sur la bonne page après la création d'un lieu
		$this->Session->write('Lieu.direction', $this->createPlace);
        $this->set('places', $this->Place->find('all', array('order'=>'Place.name')));
    }
	
	//ajout d'une nouvelle place
	public function add() {
		$this->set('regions', $this->Place->Region->find('list',array(
																	'fields'=> array('Region.name'),
																	'order'=> array('Region.name')
																	)
														)
					);//recherche dans la base de données les id des regions		
		if ($this->request->is('post')) {
            $this->Place->create();
			// stockage du $session dans une variable
			$lieuDirection = $this->Session->read('Lieu.direction');
            if ($this->Place->save($this->request->data)) {
                $this->Session->setFlash(__('La place a été sauvegardé'));
					// test redirection après création d'un lieu
					
					if ($lieuDirection == $this->createPlaceTournament){
						return $this->redirect(array('controller' => 'tournaments', 'action' => 'add'));
					} else {
						return $this->redirect(array('action' => 'index'));
					}
					
            } else {
                $this->Session->setFlash(__('La place n\'a pas été sauvegardée. Merci de réessayer.'));
				
            }
        }
    }
	
	//modification d'un lieu
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Place'));
		}

		$place = $this->Place->findById($id);
		if (!$place) {
			throw new NotFoundException(__('Invalid Place'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Place->id = $id;
			if ($this->Place->save($this->request->data)) {
				$this->Session->setFlash(__('Your Place has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your Place.'));
		}

		if (!$this->request->data) {
			$this->request->data = $place;
		}
	}
	
	//Suppression d'un lieu
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Place->delete($id)) {
			$this->Session->setFlash(
				__('Le lieu avec id : %s a été supprimé.', h($id))
			);
			return $this->redirect(array('action' => 'index'));
		}
	}	
	
}
?>