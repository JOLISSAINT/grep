<?php if (AuthComponent::user('id') == 0) { header("Location: http://teampong-fabio.kudos.ch/users/login"); } ?>
<!-- Vue de la page d'accueil listant tous les utilisateurs -->

<?php
//$this->requestAction('/users/naviguer');
if (AuthComponent::user('id')) {
echo $this->Html->link('Create a user', array('controller' => 'users', 'action'=>'add'));
}

?>

	<div class="col-lg-12">
	    <h1 class="page-header">Utilisateurs</h1>
	</div>
	
	<div class="col-lg-12">
	    <div class="panel panel-default">
	        <div class="panel-heading">
	            Liste des utilisateurs du système
	        </div>
	        <!-- /.panel-heading -->
	        <div class="panel-body">
	            <div class="table-responsive">
	                <table class="table table-striped table-bordered table-hover">
	                    <thead>
							<?php echo $this->Html->tableHeaders(array('#', 'Prénom', 'Nom', 'Rôle','','')); ?>
	                    </thead>
						<tbody>

						
						 <?php
						 
							if (AuthComponent::user('roles_id') == 2) {
								$tableau = $usersAdmin;
							} elseif (AuthComponent::user('roles_id') == 3) {
								$tableau = $usersGestionnaire;
							} else {
								$tableau = $users;
							}
						 
							foreach ($tableau as $user): ?>
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
									</td>
									
									<td>
										<?php echo $this->Form->postLink(
											'Supprimer',
											array('action' => 'delete', $user['User']['id']),
											array('confirm' => 'Etes-vous sûr de vouloir supprimer cet utilisateur ?'));
										?>
									</td>
								</tr>
							<?php endforeach; ?>
		
					</table>
					
                </div>
                <!-- /.table-responsive -->
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>

					