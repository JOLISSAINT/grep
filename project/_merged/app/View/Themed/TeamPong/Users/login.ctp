<!-- Fichier : //app/View/Users/login.ctp -->
<!-- Vue de la connexion d'un utilisateur -->
<?php
//$this->requestAction('/users/naviguer');
?>
<!--    <fieldset>
        <legend>
            <?php echo __('Please enter your email and password'); ?>
        </legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>-->

			<!--<?php echo $this->Session->flash('auth'); ?>-->
			<?php echo $this->Form->create('User'); ?>            

			<?php //echo AuthComponent::password("bellino"); ?>
			
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Login</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Veuillez vous connecter pour afficher cette page
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <?php echo $this->Form->input('email', array("placeholder"=>"E-mail", "class"=>"form-control"))  ?>
                                        </div>
                                        <div class="form-group">
                                            <?php echo $this->Form->input('password', array("placeholder"=>"Mot de passe", "class"=>"form-control"))  ?>
                                        </div>
                                        
										<?php
											$options = array(
											    'label' => 'Login',
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
