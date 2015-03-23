<!-- Fichier : /app/View/Tournaments/add.ctp -->
<!-- Vue de l'ajout d'un tournoi -->
<?php
//$this->requestAction('/users/naviguer');

echo $this->Form->create('Tournament'); 
echo $this->Html->link('Ajouter un nouveau lieu', array('controller' => 'places', 'action'=>'add'));

?>


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cr&eacute;er un tournoi</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Entrer les informations du nouveau tournoi
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('name', array("placeholder"=>"Nom", "class"=>"form-control"))  ?>
                                        </div>
										<div class="form-group">
                                            <?php echo $this->Form->input('table_nb', array("placeholder"=>"Number", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('time', array("type"=>"time", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('date', array("type"=>"date", "class"=>"form-control"))  ?>
                                        </div> 
										<!-- FAB MODIF -->
										<div class="form-group">
											<?php
												echo $this->Form->input('places_id', array(			
											            'options' => array($places),
											            'class' => 'form-control'		
														)
											);
											?>
                                        </div>
                                        
										<div class="form-group">
											<?php
												echo $this->Form->input('users.', array('multiple' => 'checkbox', 'options' => $users));
											?>
											
                                        </div>
                                        
                                        
										<?php
											/* FAB MODIF */
											echo $this->Form->hidden('created_by', array('value' => AuthComponent::user('id')));
											echo $this->Form->hidden('modified_by', array('value' => '0'));
											echo $this->Form->hidden('deleted_by', array('value' => '0'));
											
											// Submit button:
											$options = array(
											    'label' => 'Créer le tournoi',
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



<?php

?>