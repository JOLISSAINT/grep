<?php
// app/Model/Region.php

class Region extends AppModel {
	
	// Le model regions est associ� au model Places
	public $hasMany = array('Place');
	
	//Mod�le de la table Region. Config de chaque region
    public $name = 'Region';
    public $validate = array(
		'name' => array(
            'required' => array(
                'rule' => array('notEmpty')
            )
        )
    );
	
}
?>