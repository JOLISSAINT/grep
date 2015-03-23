<?php
class Serie extends AppModel {
	
	public $belongsTo = array(
        'Tournament' => array(
            'className' => 'Tournament',
            'foreignKey' => 'tournaments_id'
        )
    );
	
	//Modèle de la table Serie. Config de chaque attribut 
	public $name = 'Serie';
	
	public $validate = array(
        'min_ranking' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'allowEmpty' => false
            )
        ),
        'max_ranking' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'allowEmpty' => false
            )
        ),
		'min_age' => array(
			'required' => array(
				'rule' => 'date',
				'allowEmpty' => false
			)
		),
		'max_age' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
        'min_nb_player' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
		'max_nb_player' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
		'poolstage_nb' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
            )
        ),
		'knockout_nb' => array(
            'required' => array(
                'rule' => array('notEmpty'),
				'allowEmpty' => false
            )
        ),
		'poolstage_player_nb' => array(
            'valid' => array(
                'rule' => array('notEmpty'),
                'allowEmpty' => false
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
		'series_status_id' => array(
            'valid' => array(
                'rule' => array('inList', array(1)),
                'allowEmpty' => false
            )
        ),
		'tournaments_id' => array(
            'valid' => array(
                'rule' => array('inList', array(1, 2, 3, 4)),
                'allowEmpty' => false
            )
        ),
    );	
}

?>