<!-- Fichier : /app/View/Places/add.ctp -->
<!-- Vue de l'ajout d'un lieu -->
<?php
//$this->requestAction('/users/naviguer');
?>
<h1>Ajouter un lieu</h1>
<?php


echo $this->Form->create('Place');
echo $this->Form->input('address');
echo $this->Form->input('zip');
echo $this->Form->input('city');
echo $this->Form->input('name');
echo $this->Form->hidden('created_by', array('value' => AuthComponent::user('id')));
echo $this->Form->input('regions_id', array(			
            'options' => array($regions)	
));
echo $this->Form->end('Sauvegarder le lieu');
?>