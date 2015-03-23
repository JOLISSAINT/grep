<!-- Vue de la page d'accueil listant tous les utilisateurs -->

<?php
//$this->requestAction('/users/naviguer');
if (AuthComponent::user('id')) {
echo $this->Html->link('Create a user', array('controller' => 'users', 'action'=>'add'));
}

?>

<table>
    <tr>
        <th>Id</th>
        <th>Prénom</th>
        <th>Nom</th>
        <th>Rôle</th>
		<th>Action</th>
    </tr>

<!-- Ici, nous bouclons sur le tableau $users afin d'afficher les informations des posts -->

    <?php foreach ($users as $user): ?>
    <tr>
        <td><?php echo $user['User']['id']; ?></td>
		<td><?php echo $user['User']['first_name']; ?></td>
		<td><?php echo $user['User']['last_name']; ?></td>
		<td><?php echo $user['Role']['name']; ?></td>
		<td>
            <?php echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $user['User']['id'])
            ); ?>
			<?php echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $user['User']['id']),
                array('confirm' => 'Etes-vous sûr de vouloir supprimer cet utilisateur ?'));
            ?>
		</td>
        
    </tr>
    <?php endforeach; ?>

</table>