<?php if (AuthComponent::user('id') == 0) { header("Location: http://teampong-fabio.kudos.ch/users/login"); } ?>
<!-- Vue de la page d'accueil d'un lieu -->

<?php
//$this->requestAction('/places/naviguer');
?>

                <div class="col-lg-12">
                    <h1 class="page-header">Lieux</h1>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Lieux enregistr&eacute;s | <?php echo $this->Html->link('Ajouter un nouveau lieu', array('controller' => 'places', 'action'=>'add')); ?>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
										<?php echo $this->Html->tableHeaders(array('Nom', 'Adresse', 'Zip', 'Ville', 'Action')); ?>
                                    </thead>
									<tbody>
								
									    <?php foreach ($places as $place): ?>
									    <tr>
									        <td><?php echo $place['Place']['name']; ?></td>
											<td><?php echo $place['Place']['address']; ?></td>
											<td><?php echo $place['Place']['zip']; ?></td>
											<td><?php echo $place['Place']['city']; ?></td>											
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
									    <?php 
										    endforeach; 
										?>
									    									    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

