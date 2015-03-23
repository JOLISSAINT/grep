<?php
class Role extends AppModel {

	
	
	// Le model Tournament est associé aux models User et Place
	public $hasMany = array('User');
	
	
	//Modèle de la table Role. Config de chaque attribut 
    public $name = 'Role';
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'allowEmpty' => false
            )
        )
    );	
	
}
?>