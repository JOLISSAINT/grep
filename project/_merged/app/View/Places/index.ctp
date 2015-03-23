<!-- Vue de la page d'accueil d'un lieu -->

<?php
//$this->requestAction('/places/naviguer');
echo $this->Html->link('Ajouter un nouveau lieu', array('controller' => 'places', 'action'=>'add'));
?>

<table>
    <tr>
        <th>Id</th>
        <th>Adresse</th>
        <th>Zip</th>
        <th>Ville</th>
		<th>Nom</th>
		<th>Action</th>
    </tr>

<!-- Ici, nous bouclons sur le tableau $places afin d'afficher les informations des lieux -->

    <?php foreach ($places as $place): ?>
    <tr>
        <td><?php echo $place['Place']['id']; ?></td>
		<td><?php echo $place['Place']['address']; ?></td>
		<td><?php echo $place['Place']['zip']; ?></td>
		<td><?php echo $place['Place']['city']; ?></td>
		<td><?php echo $place['Place']['name']; ?></td>
		<td>
            <?php echo $this->Html->link(
                'Editer',
                array('action' => 'edit', $place['Place']['id'])
            ); ?>
			<?php echo $this->Form->postLink(
                'Supprimer',
                array('action' => 'delete', $place['Place']['id']),
                array('confirm' => 'Etes-vous sûr de vouloir supprimer ce lieu ?'));
            ?>
		</td>
        
    </tr>
    <?php endforeach; ?>

</table>