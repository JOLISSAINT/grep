<?php
class Tournament extends AppModel {

	
	
	// Le model Tournament est associé aux models User et Place
	public $hasAndBelongsToMany = array(
				'User' =>
					array(
						'className' => 'User',
						'with' => 'tournaments_users'
					)
				);

	public $belongsTo = array(
        'Place' => array(
            'className' => 'Place',
            'foreignKey' => 'places_id'
        )
    );
	
	// Le model Tournament est associé au model Serie
	public $hasMany = array('Serie' => array(
			'className' => 'Serie',
			'foreignKey' => 'tournaments_id'
		)
	);
	
	
	//Modèle de la table Tournament. Config de chaque attribut 
    public $name = 'Tournament';
    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'allowEmpty' => false
            )
        ),
        'time' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'allowEmpty' => false
            )
        ),
		'date' => array(
			'required' => array(
				'rule' => 'date',
				'allowEmpty' => false
			)
		),
		'table_nb' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
        'created_by' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
		'modified_by' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
		'deleted_by' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
		'places_id' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'allowEmpty' => false
            )
        )
    );	
	
}
?>