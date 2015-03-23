<!-- Fichier : /app/View/Tournaments/index.ctp -->
<!-- Vue de la page d'accueil listant tous les tournois -->
<?php
//$this->requestAction('/users/naviguer');
?>
<?php
//Vérification si un utilisateur est connecté à l'application
/*if (AuthComponent::user('id')) {
	echo 'Utilisateur : '.AuthComponent::user('first_name').' '; 
	echo $this->Html->link('Logout', array('controller' => 'users', 'action'=>'logout'));
	echo "</br>";
	echo $this->Html->link('Creer un tournoi', array('action'=>'add'));
	echo "</br>";
} else {
	echo $this->Html->link('Login', array('controller' => 'users', 'action'=>'login'));
}
//Vérification pour savoir quel action pourra effectuer un utilisateur de rôle 1 qui est Admin
/*if (AuthComponent::user('role_id')==1) {
	echo $this->Html->link('Afficher les utilisateurs', array('controller' => 'users', 'action'=>'index'));
	echo "</br>";
	echo $this->Html->link('Afficher les lieux', array('controller' => 'places', 'action'=>'index'));
}*/
?>


                <div class="col-lg-12">
                    <h1 class="page-header">Tournois</h1>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Tournois existants
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
									        <th>Lieu</th>
											<?php if (AuthComponent::user('id') && (AuthComponent::user('roles_id') != 4)) 
												echo "<th>G&eacute;r&eacute; par</th>";
											?>
									        <th>Nom du tournoi</th>
											<th>Time</th>
											<th>Date</th>
											<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
	                                    <?php $id=0;
										$cptGere = 0;
										/*
										echo "<pre>";
										print_r($tournaments);
										echo "</pre">
										*/
										$nomConnecte = (AuthComponent::user('first_name'));
										foreach ($tournaments as $tournament): ?>
										    <tr>
												<!-- FAB MODIF -->
												<td>
												<?php echo $tournament['Place']['name']; ?></td>
												<?php if (AuthComponent::user('id') && (AuthComponent::user('roles_id') != 4)) {
													echo "<td>";
														$id_user=0;
														foreach ($tournaments[$id]['User'] as $user):
															$gerePar = $tournament['User'][$id_user]['first_name'];
															echo $tournament['User'][$id_user]['first_name'];
														$id_user++; endforeach;
													echo "</td>";
													}
												?>
												<td><?php echo $tournament['Tournament']['name']; ?></td>
												<td><?php echo $tournament['Tournament']['time']; ?></td>
												<td><?php echo $tournament['Tournament']['date']; ?></td>
												<!-- END FAB MODIF -->
												<?php if (AuthComponent::user('id') && (AuthComponent::user('roles_id') != 4)) { ?>
												<td>
												<?php 
													
													if (AuthComponent::user('roles_id') == 3) {
														if ($nomConnecte == $gerePar) {
															$cptGere++;
															echo $this->Html->link(
																'Administrer ',
																array('action' => 'admin', $tournament['Tournament']['id'])
															);
															echo $this->Html->link(
																'Editer ',
																array('action' => 'edit', $tournament['Tournament']['id'])
															);
															echo $this->Form->postLink(
																'Supprimer',
																array('action' => 'delete', $tournament['Tournament']['id']),
																array('confirm' => 'Etes-vous sur de vouloir supprimer ce tournoi ?')
															);
														}
													} else {
														echo $this->Html->link('Administrer ', array('controller' => 'series', 'action'=>'add'));
														echo $this->Html->link(
															'Editer ',
															array('action' => 'edit', $tournament['Tournament']['id'])
														);
														echo $this->Form->postLink(
															'Supprimer',
															array('action' => 'delete', $tournament['Tournament']['id']),
															array('confirm' => 'Etes-vous sur de vouloir supprimer ce tournoi ?')
														);
													}
													?>
												</td>
												<?php 
												} else {
												?>
												<td>
												<?php
													echo $this->Html->link(
														'Afficher ',
														 array('action' => 'display', $tournament['Tournament']['id'])
													);
												?>
												</td>
												<?php
												}?>
										    </tr>
									    <?php $id++; endforeach; ?>
									    <?php unset($tournament); ?>	                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
