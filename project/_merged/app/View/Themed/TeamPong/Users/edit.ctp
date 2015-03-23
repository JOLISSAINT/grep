<!-- Fichier: /app/View/Users/edit.ctp -->
<!-- Vue de la modification d'un utilisateur -->
<?php
//$this->requestAction('/users/naviguer');
?>

<?php echo $this->Form->create('User');?>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editer l'utilisateur</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Entrer les nouvelles informations de l'utilisateur
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
                                        <div class="form-group">
									        <?php
										    	echo $this->Form->input('role_id', array(
									            'options' => array(1 => 'Admin', 2 => 'Gestionnaire')
									        ));
									        ?>

                                        </div>                                         
										<?php
											$options = array(
											    'label' => 'Sauvegarder l\'utilisateur',
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
