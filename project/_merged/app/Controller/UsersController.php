<?php
// app/Controller/UsersController.php

class UsersController extends AppController {

    public function beforeFilter() {
		parent::beforeFilter();
		// Permet aux utilisateurs de s'enregistrer et de se déconnecter
		$this->Auth->allow('add', 'logout');
	}

	//Page d'accueil retournant tous les utilisateurs
    public function index() {
        $this->User->recursive = 0;	
        $this->set('users', $this->paginate());
		// tous les users
		$this->set('users', $this->User->find('all'));
		// tous les users que peut voir un Admin
		$this->set('usersAdmin', $this->User->find('all', array('conditions' => array('User.roles_id >' => 2))));
		// tous les users que peut voir un Gestionnaire
		$this->set('usersGestionnaire', $this->User->find('all', array('conditions' => array('User.roles_id =' => 4))));
    }

	//Vérification de l'existence d'un user
    public function view($id = null) {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        $this->set('user', $this->User->read(null, $id));
    }

	//Ajout d'un user
    public function add() {
	
		if ($this->request->is('post')) {
            $this->User->create();
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('L\'user a été sauvegardé'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('L\'user n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        }
    }
	
	//Modification d'un user
	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid user'));
		}

		$user = $this->User->findById($id);
		if (!$user) {
			throw new NotFoundException(__('Invalid user'));
		}

		if ($this->request->is(array('post', 'put'))) {
			$this->User->id = $id;
			if ($this->User->save($this->request->data)) {
				
				// TODO: rafraichir variables de session pour updater affichage du user courant
				
				$this->Session->setFlash(__('Your user has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your user.'));
		}

		if (!$this->request->data) {
			$this->request->data = $user;
		}
	}
	
	//Suppression d'un user
    public function delete($id = null) {
        // Avant 2.5, utilisez
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('User invalide'));
        }
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User supprimé'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('L\'user n\'a pas été supprimé'));
        return $this->redirect(array('action' => 'index'));
    }
	
	//Connexion à l'application
	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				return $this->redirect(array('controller' => 'tournaments', 'action' => 'index'));
			} else {
				//$this->Session->setFlash(__("Email d'user ou mot de passe invalide, réessayer")); // test RD
				$this->Session->setFlash(__("Email ou mot de passe invalide"), 'alert-box', array('class'=>'alert-danger')); // test RD
			}
		}
	}

	//Déconnexion de l'application
	public function logout() {
		$this->Session->destroy('User');
		$this->Session->setFlash(__('You\'ve successfully logged out.'));
		return $this->redirect(array('action' => 'login'));
	}
	
	public function naviguer(){
		echo"<a href='http://teampong-fernand.kudos.ch/users/login'> Login</a>";
		echo"<a href='http://teampong-fernand.kudos.ch/tournaments'> Tournaments</a>";
		echo"<a href='http://teampong-fernand.kudos.ch/tournaments/add'> Creer un tournoi</a>";
		echo"<a href='http://teampong-fernand.kudos.ch/users'> Afficher les utilisateurs</a>";
		echo"<a href='http://teampong-fernand.kudos.ch/users/add'> Creer un utilisateur</a>";
	}

}
?>