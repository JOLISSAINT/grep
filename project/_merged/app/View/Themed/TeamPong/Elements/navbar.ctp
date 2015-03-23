        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">


<!-- PROBLEME -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Team-Pong</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				
				<?php if (!AuthComponent::user('id')) { ?>
					<li>
						<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'login')); ?>">
							<i class="fa fa-sign-in fa-fw"></i> Login
						</a>
					</li>
					
				<?php } else { ?>
				           
	               Connecté en tant que <?php echo AuthComponent::user('first_name') . " " . AuthComponent::user('last_name'); ?>
	
	
	                <li class="dropdown">
	                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
	                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
	                    </a>
	                    <ul class="dropdown-menu dropdown-user">
	                        <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a></li>
	                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
	                        <li class="divider"></li>
	                        <li>
	                        	<a href="<?php echo $this->Html->url(array('controller' => 'users', 'action'=>'logout')); ?>">
		                        	<i class="fa fa-sign-out fa-fw"></i> Logout
		                        </a>
		                    </li>
	                    </ul>
	                    <!-- /.dropdown-user -->
	                </li>
	                <!-- /.dropdown -->
                <?php } // if logged in ?>
            </ul>
            <!-- /.navbar-top-links -->

<!-- /PROBLEME -->









            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
							<a href="<?php echo $this->Html->url(array("controller" => "tournaments", "action" => "index")); ?>">
								<i class="fa fa-dashboard fa-fw"></i> Accueil
							</a>
                        </li>
                        
                        <li>
                            <a href="tables.html"><i class="fa fa-gamepad fa-fw"></i> Tournois<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level <?php if($this->params['controller'] == 'tournaments') echo " collapse-in collapse in"; ?>">
                                <li>
									<?php
									if($this->params['controller'] == 'tournaments' && $this->action == 'index') $classActive = "active"; else $classActive="";
									echo $this->Html->link(
									    'Tous les tournois',
									    array(
									        'controller' => 'tournaments',
									        'action' => 'index'
									    ),
									    array(
										    'class' => $classActive
										)
									);
									?>
                                </li>
                                <li>
									<?php
									if (AuthComponent::user('id') && (AuthComponent::user('roles_id') != 4)) {
										if($this->params['controller'] == 'tournaments' && $this->action == 'add') {
											$classActive = "active";
										} else {
											$classActive="";
										}									
										echo $this->Html->link(
											'Créer un tournoi',
											array(
												'controller' => 'tournaments',
												'action' => 'add'
											),
											array(
												'class' => $classActive
											)
										);
									}
									?>
                                </li>
                            </ul>                            
                        </li>
						
                        <?php
						if (AuthComponent::user('id') && (AuthComponent::user('roles_id') != 4)) { 
						?>
							<li>
								<a href="#"><i class="fa fa-map-marker fa-fw"></i> Lieux<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level <?php if($this->params['controller'] == 'places') echo " collapse-in collapse in"; ?>">
									<li>
										<?php
										if($this->params['controller'] == 'places' && $this->action == 'index') $classActive = "active"; else $classActive="";	
										echo $this->Html->link(
											'Tous les lieux',
											array(
												'controller' => 'places',
												'action' => 'index'
											),
											array(
												'class' => $classActive
											)
										);
										?>
									</li>
									<li>
										<?php
										if($this->params['controller'] == 'places' && $this->action == 'add') $classActive = "active"; else $classActive="";		
										echo $this->Html->link(
											'Ajouter un lieu',
											array(
												'controller' => 'places',
												'action' => 'add'
											),
											array (
												'class' => $classActive
											)
										);
										?>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
						   
							<li>
								<a href="#"><i class="fa fa-user fa-fw"></i> Joueurs<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level <?php if($this->params['controller'] == 'players') echo " collapse-in collapse in"; ?>">
									<li>
										<?php
										if($this->params['controller'] == 'players' && $this->action == 'index') $classActive = "active"; else $classActive="";	
										echo $this->Html->link(
											'Joueurs existants',
											array(
												'controller' => 'players',
												'action' => 'index'
											),
											array(
												'class' => $classActive
											)
										);
										?>
									
									</li>
									<li>
										<?php
										if($this->params['controller'] == 'players' && $this->action == 'import') $classActive = "active"; else $classActive="";
										echo $this->Html->link(
											'Importer depuis la STT',
											array(
												'controller' => 'players',
												'action' => 'import'
											),
											array(
												'class' => $classActive
											)
										);
										?>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>                       
							
							<li>
								<a href="#"><i class="fa fa-wrench fa-fw"></i> Paramètres<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level <?php if($this->params['controller'] == 'users') echo " collapse-in collapse in"; ?>">
									
									<li>
									<?php
										if (AuthComponent::user('roles_id') != 4) {
									?>
										<a href="#">Utilisateurs <span class="fa arrow"></span></a>
										<ul style="" class="nav nav-third-level">
											<li>
												<?php
													if($this->params['controller'] == 'users' && $this->action == 'index') $classActive = "active"; else $classActive="";
													echo $this->Html->link(
														'Tous les utilisateurs',
														array(
															'controller' => 'users',
															'action' => 'index'
														),
														array(
															'class' => $classActive
														)
													);
												?>
											</li>
											<li>
												<?php
												if($this->params['controller'] == 'users' && $this->action == 'add') $classActive = "active"; else $classActive="";	
												echo $this->Html->link(
													'Créer un utilisateur',
													array(
														'controller' => 'users',
														'action' => 'add'
													)
												);
												
										}	
												?>
											</li>
										</ul>
										<!-- /.nav-third-level -->
									</li>                              
								</ul>
								<!-- /.nav-second-level -->
							</li>
                        <?php } ?>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>













