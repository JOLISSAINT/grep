<?php
class Place extends AppModel {

	// Le model user est associé au model Tournament et Region et place
	public $belongsTo = array(
        'Region' => array(
            'className' => 'Region',
            'foreignKey' => 'regions_id'
		)
    );
	
	public $hasMany = array('Tournament' => array(
			'className' => 'tournaments',
			'foreignKey' => 'places_id'
		)
	);
	
	//Modèle de la table Place. Config de chaque attribut 
    public $name = 'Place';
    public $validate = array(
		'address' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
		'zip' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'city' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        ),
        'name' => array(
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
        'regions_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
            )
        )
    );	
	
}
?>