<!-- Fichier: /app/View/Tournaments/edit.ctp -->
<!-- Vue de la modification d'un tournoi -->
<?php
//$this->requestAction('/users/naviguer');
?>
<h1>Modifier un tournoi</h1>
<?php
echo $this->Form->create('Tournament');
echo $this->Form->input('place_id', array(
            'options' => array(1 => 'Aight')));
echo $this->Form->input('user_id', array(
            'options' => array(1 => 'Elvis', 2 => 'Fabio')));
echo $this->Form->input('name');
echo $this->Form->input('time');
echo $this->Form->input('date');
echo $this->Form->end('Sauvegarder le tournoi');
?>