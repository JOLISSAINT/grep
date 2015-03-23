<!-- Fichier : /app/View/Tournaments/add.ctp -->
<!-- Vue de l'ajout d'un tournoi -->
<?php
//$this->requestAction('/users/naviguer');

?>

<h1>Ajouter un tournoi</h1>
<?php
echo $this->Form->create('Tournament'); 
echo $this->Html->link('Ajouter un nouveau lieu', array('controller' => 'places', 'action'=>'add'));
echo $this->Form->input('name');
echo $this->Form->input('time', array('type' => 'time'));
echo $this->Form->input('date', array('type' => 'date'));
echo $this->Form->hidden('created_by', array('value' => AuthComponent::user('id')));
echo $this->Form->input('place_id', array(			
            'options' => array($places);
));
echo $this->Form->end('Sauvegarder le tournoi');

?>