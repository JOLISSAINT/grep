<?php
// app/Model/User.php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
	
	// Le model user est associé au model User_has_tournament
	public $hasAndBelongsToMany = array(
				'Tournament' =>
					array(
						'className' => 'Tournament',
						'joinTable' => 'tournaments_users',
						'foreignKey' => 'user_id',
						'associationForeignKey' => 'tournament_id',
						'unique' => true,
						'with' => 'tournaments_users'
					)
				);
	
	public $belongsTo = array('Role' => array(
			'className' => 'Role',
			'foreignKey' => 'roles_id'
		)
	);
	
	//Modèle de la table User. Config de chaque user
    public $name = 'User';
    public $validate = array(
		'first_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
		'last_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'created_by' => array(
            'valid' => array(
                'rule' => array('inList', array(1, 2, 3, 4)),
                'allowEmpty' => false
            )
        ),
		'modified_by' => array(
            'valid' => array(
                'rule' => array('inList', array(1, 2, 3, 4)),
                'allowEmpty' => false
            )
        ),
		'deleted_by' => array(
            'valid' => array(
                'rule' => array('inList', array(1, 2, 3, 4)),
                'allowEmpty' => false
            )
        ),
		'roles_id' => array(
            'valid' => array(
                'rule' => array('inList', array(1, 2, 3, 4)),
                'allowEmpty' => false
            )
        )
    );
	
	//Méthode qui permet de crypter le mot de passe
	public function beforeSave($options = array()) {
		if (isset($this->data[$this->alias]['password'])) {
			$passwordHasher = new SimplePasswordHasher();
			$this->data[$this->alias]['password'] = $passwordHasher->hash(
				$this->data[$this->alias]['password']
			);
		}
		return true;
	}
}
?>