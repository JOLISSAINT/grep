<?php if (AuthComponent::user('id') == 0) { header("Location: http://teampong-fabio.kudos.ch/users/login"); } ?>
<!-- app/View/Users/add.ctp -->
<!-- Vue de l'ajout d'un utilisateur-->
<div class="users form">
<?php echo $this->Form->create('User');?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cr&eacute;er un utilisateur</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Entrer les informations du nouvel utilisateur
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('first_name', array("placeholder"=>"Prénom", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('last_name', array("placeholder"=>"Nom", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('email', array("placeholder"=>"E-mail", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('password', array("placeholder"=>"Mot de passe", "class"=>"form-control"))  ?>
                                        </div>    
										
										<?php echo $this->Form->hidden('created_by', array('value' => AuthComponent::user('id'))); ?>
          								
										<div class="form-group">
									        <?php
												switch ($i = AuthComponent::user('roles_id')) {
													case 1:
														echo $this->Form->input('roles_id', array(
														'options' => array(1 => 'Super-administrateur', 
																		   2 => 'Administrateur',
																		   3 => 'Gestionnaire',
																		   4 => 'Aide'
																		  )));
														break;
													case 2:
														echo $this->Form->input('roles_id', array(
														'options' => array(3 => 'Gestionnaire',
																		   4 => 'Aide'
																		   )));
														break;
													case 3:
														echo $this->Form->input('roles_id', array(
														'options' => array(4 => 'Aide'
																		   )));
														break;
												}
									        ?>

                                        </div>                                         
										<?php
											$options = array(
											    'label' => 'Créer l\'utilisateur',
											        'class' => 'btn btn-default'
											    
											);
											echo $this->Form->end($options);
										?>	                                        
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

</div>
