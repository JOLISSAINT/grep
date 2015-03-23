<!-- Fichier : /app/View/Tournaments/add.ctp -->
<!-- Vue de l'ajout d'un tournoi -->
<?php
//$this->requestAction('/users/naviguer');

echo $this->Form->create('Serie'); 

?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cr&eacute;er une s&eacute;rie</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Entrer les informations d'une nouvelle série
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('min_ranking', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
										<div class="form-group">
                                            <?php echo $this->Form->input('max_ranking', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('min_age', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('max_age', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
										  <div class="form-group">
                                            <?php echo $this->Form->input('min_nb_player', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
										<div class="form-group">
                                            <?php echo $this->Form->input('max_nb_player', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
										</div>
										<div class="form-group">
                                            <?php echo $this->Form->input('poolstage_nb', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
										<div class="form-group">
                                            <?php echo $this->Form->input('knockout_nb', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
										<div class="form-group">
                                            <?php echo $this->Form->input('poolstage_player_nb', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
										<?php
											echo $this->Form->hidden('created_by', array('value' => AuthComponent::user('id')));
											echo $this->Form->hidden('series_status_id', array('value' => 1));
											echo $this->Form->hidden('tournaments_id', array('value' => 1));
											
											// Submit button:
											$options = array(
											    'label' => 'Créer la série',
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