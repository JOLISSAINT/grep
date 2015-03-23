<!-- Fichier: /app/View/Tournaments/display.ctp -->
<!-- Vue de la modification d'un tournoi -->
<?php
//$this->requestAction('/users/naviguer');

// recupération de l'id du tournoi courant
$idTournoi = $this->data['Tournament']['id'];

?>


 <div class="col-lg-12">
                    <h1 class="page-header">Affichage du tournoi</h1>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <th>
								<td>
									<?php foreach ($tournaments as $tournament): 
										if ($tournament['Tournament']['id'] == $idTournoi) {
											echo "Nom du tournoi : ".$tournament['Tournament']['name'];

										} 
									endforeach;	?>
								</td>
								<td>
									"le bouton : S'inscrire viendra sur la droite ou pas..."
								</td>
							</th>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
									        <th>Champ</th>
									        <th>Valeur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
	                                    <?php 
										foreach ($tournaments as $tournament):
											if ($tournament['Tournament']['id'] == $idTournoi) {  ?>
										    <tr>
												<td>
													Lieu
												</td>
												<td>
													<?php echo $tournament['Place']['name']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Time
												</td>
												<td>
													<?php echo $tournament['Tournament']['time']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Date
												</td>
												<td>
													<?php echo $tournament['Tournament']['date']; ?>
												</td>
											</tr>
											<tr>
												<?php foreach ($tournaments[0]['Serie'] as $ser): ?>
												<td>
													Nombre de joueur minimum
												</td>
												<td>
													<?php echo $ser['min_nb_player']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Nombre de joueurs maximum
												</td>
												<td>
													<?php echo $ser['max_nb_player']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Nombre de joueurs inscrit
												</td>
												<td>
													
												</td>
											</tr>
											<tr>
												<td>
													Regions
												</td>
												<td>
													
												</td>
											</tr>
											<tr>
												<td>
													Classement minimum
												</td>
												<td>
													<?php echo $ser['max_ranking']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Classement maximum
												</td>
												<td>
													<?php echo $ser['min_ranking']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Age minimum
												</td>
												<td>
													<?php echo $ser['min_age']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Age maximum
												</td>
												<td>
													<?php echo $ser['max_age']; ?>
												</td>
											</tr>
											<tr>
												<td>
													Type de tournoi
												</td>
												<td>
													
												</td>
											</tr>
											<?php endforeach; } ?>
										    
									    <?php endforeach; ?>
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
