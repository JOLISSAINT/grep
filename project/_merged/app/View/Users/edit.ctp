<!-- Fichier: /app/View/Users/edit.ctp -->
<!-- Vue de la modification d'un utilisateur -->
<?php
//$this->requestAction('/users/naviguer');
?>
<?php
echo $this->Form->create('User');
echo $this->Form->input('first_name');
echo $this->Form->input('last_name');
echo $this->Form->input('role_id', array(
            'options' => array(1 => 'Admin', 2 => 'Gestionnaire')
        ));
echo $this->Form->end('Save User');
?>