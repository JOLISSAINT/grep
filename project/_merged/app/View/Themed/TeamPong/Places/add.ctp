<!-- Fichier : /app/View/Places/add.ctp -->
<!-- Vue de l'ajout d'un lieu -->
<?php
//$this->requestAction('/users/naviguer');
?>

<!--<h1>Ajouter un lieu</h1>
<?php
echo $this->Form->create('Place');
echo $this->Form->input('address');
echo $this->Form->input('zip');
echo $this->Form->input('city');
echo $this->Form->input('name');
/* FAB MODIF */
echo $this->Form->input('regions_id');
echo $this->Form->end('Sauvegarder le lieu');
?>-->


			<?php
			echo $this->Html->link('<- Retour aux lieux', array(
			'controller' => 'places',
			'action' => 'index'
			));
			?>

			<?php echo $this->Form->create('Place'); ?>            

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Cr&eacute;er un lieu</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Cr&eacute;er un lieu
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form role="form">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('address', array("placeholder"=>"Adresse", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('zip', array("placeholder"=>"Code postal", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('city', array("placeholder"=>"Localité", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('name', array("placeholder"=>"Nom", "class"=>"form-control"))  ?>
                                        </div> 
										<?php
											/* FAB MODIF */
											echo $this->Form->hidden('created_by', array('value' => AuthComponent::user('id')));
										?>	             										
										<!-- FAB MODIF -->
										<div class="form-group">
                                            <?php echo $this->Form->input('regions_id', array("placeholder"=>"Region", "class"=>"form-control"))  ?>
                                        </div>  

										
										<?php
											$options = array(
											    'label' => 'Créer le lieu',
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
