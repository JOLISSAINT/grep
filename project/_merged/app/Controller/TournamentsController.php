<?php

//define('createPlaceTournament', 1);

//Controlleur Tournois

class TournamentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');
	
	// fonction permettant à ce que tout le monde puisse accéder à la page sans connexion
	public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('display');
    }

	//Affichage des infos des tournois
    public function index() {
		// tous les tournois
		$this->set('tournaments', $this->Tournament->find('all'));
		// tous les tournois que peut voir le gestionnaire connecté
		$nomConnecte = AuthComponent::user('first_name');
		// Comment faire pour tous récupérer (Place et User vu que user est un sous tableau)
		//$this->set('tournamentsGestionnaire', $this->Tournament->User->find('all', array('conditions' => array('User.first_name =' => $nomConnecte))));	
		
		// $session permettant de rediriger sur la bonne page après la création d'un place
		$this->Session->write('Lieu.direction', $this->createPlaceTournament);
    }

	//Vérification de l'existence d'un tournoi
    public function view($id) {
        if (!$id) {
            throw new NotFoundException(__('Tournoi invalide'));
        }
        $tournament = $this->Tournament->findById($id);
        if (!$tournament) {
            throw new NotFoundException(__('Tournoi invalide'));
        }
        $this->set('tournament', $tournament);
    }

	//Ajout d'un nouveau tournoi
    public function add() {
		
		$this->set('places', $this->Tournament->Place->find('list',array('fields' => array('Place.name')))); //recherche dans la base de données les noms des lieux uniquement


		$users = $this->Tournament->User->find('all', array(
															'recursive' => -1,
															'fields' => array('CONCAT(User.first_name, " ", User.last_name) AS nom', 'User.id')
														)
												);
														
		$this->set('users', $users);
		
					
		// POST a new Tournament:
		if ($this->request->is('post')) {
            
            $this->Tournament->create();

			// Copy $this->data in a new array:            			
			$data = $this->data;
			// Add a User dimension to array with User.id to link with actual object:
			$data['User']['id'] = AuthComponent::user('id');
			

			
			// Copy $this->data in a new array:            			
			/*$data = $this->data;

			
			$i=0;
			foreach($data['Tournament']['users'] as $u){
				$data['User'][$i]['id'] = $u;
				$i++;
			}
			
			// Add a User dimension to array with User.id to link with actual object:
			$data['User'][$i]['id'] = AuthComponent::user('id');
				
			print_r($data);*/

				
			// Save:					
            if ($this->Tournament->saveAssociated($data)) {	            	         
               	$this->Session->setFlash('Le tournoi a bien été créé.', 'alert-box', array('class' => 'success'));
                return $this->redirect(array('action' => 'index')); //back on index method to display tournaments
            }
            $this->Session->setFlash('Erreur lors de la création du tournoi.', 'alert-box', array('class' => 'danger'));
        }
    }
	
	//Modification d'un tournoi
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid Tournament'));
		}

		$tournament = $this->Tournament->findById($id);
		if (!$tournament) {
			throw new NotFoundException(__('Invalid Tournament'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->Tournament->id = $id;
			if ($this->Tournament->save($this->request->data)) {
				$this->Session->setFlash('Le tournoi a bien été sauvegardé.', 'alert-box', array('class' => 'success'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash('Erreur lors de la mise à jour du tournoi.', 'alert-box', array('class' => 'danger'));
		}

		if (!$this->request->data) {
			$this->request->data = $tournament;
		}
	}
	
	//Suppression d'un tournoi
	public function delete($id) {
		if ($this->request->is('get')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Tournament->delete($id)) {
			$this->Session->setFlash('Le tournoi a été supprimé.', 'alert-box', array('class' => 'success'));
			return $this->redirect(array('action' => 'index'));
		}
	}
	
	//Affichage d'un tournoi
	public function display($id = null) {
		$this->set('tournaments', $this->Tournament->find('all'));
		if (!$id) {
			throw new NotFoundException(__('Invalid Tournament'));
		}

		$tournament = $this->Tournament->findById($id);
		if (!$tournament) {
			throw new NotFoundException(__('Invalid Tournament'));
		}

		if (!$this->request->data) {
			$this->request->data = $tournament;
		}
	}	
	
}
?>