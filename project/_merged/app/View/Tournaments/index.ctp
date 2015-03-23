<!-- Fichier : /app/View/Tournaments/index.ctp -->
<!-- Vue de la page d'accueil listant tous les tournois -->
<?php
//$this->requestAction('/users/naviguer');
?>
<?php
//V�rification si un utilisateur est connect� � l'application
if (AuthComponent::user('id')) {
	echo 'Utilisateur : '.AuthComponent::user('first_name').' '; 
	echo $this->Html->link('Logout', array('controller' => 'users', 'action'=>'logout'));
	echo "</br>";
	echo $this->Html->link('Creer un tournoi', array('action'=>'add'));
	echo "</br>";
} else {
	echo $this->Html->link('Login', array('controller' => 'users', 'action'=>'login'));
}
//V�rification pour savoir quel action pourra effectuer un utilisateur de r�le 1 qui est Admin
if (AuthComponent::user('role_id')==1) {
	echo $this->Html->link('Afficher les utilisateurs', array('controller' => 'users', 'action'=>'index'));
	echo "</br>";
	echo $this->Html->link('Afficher les lieux', array('controller' => 'places', 'action'=>'index'));
}
?>
<table>
    <tr>
        <th>Place id</th>
        <th>Cree par</th>
        <th>Nom du tournoi</th>
		<th>Time</th>
		<th>Date</th>
		<th>Action</th>
    </tr>

<!-- Ici, nous bouclons sur le tableau $tournois afin d'afficher les informations des tournois -->
    <?php foreach ($tournaments as $tournament): ?>
	<tr>
		<td><?php echo $tournament['Place']['name']; ?></td>
		<td><?php echo $tournament['User']['first_name']; ?></td>
		<td><?php echo $tournament['Tournament']['name']; ?></td>
		<td><?php echo $tournament['Tournament']['time']; ?></td>
		<td><?php echo $tournament['Tournament']['date']; ?></td>
		<td>
            <?php echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $tournament['Tournament']['id'])
            ); ?>
			<?php echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $tournament['Tournament']['id']),
                array('confirm' => 'Etes-vous s�r de vouloir supprimer cet utilisateur ?'));
            ?>
		</td>
        
    </tr>
    <?php endforeach; ?>

</table>