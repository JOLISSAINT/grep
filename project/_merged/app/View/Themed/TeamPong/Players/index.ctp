<?php if (AuthComponent::user('id') == 0) { header("Location: http://teampong-fabio.kudos.ch/users/login"); } ?>
<!-- File: /app/View/Themed/TeamPong/Players/index.ctp -->

                <div class="col-lg-12">
                    <h1 class="page-header">Players</h1>
                </div>

                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Joueurs enregistrés
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Club</th>
                                            <th>Category</th>
                                            <th>Canton</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									    <?php foreach ($players as $player): ?>
										    <tr>
										        <td><?php echo $player['Player']['player_id']; ?></td>
										        <td><?php echo $player['Player']['name']; ?></td>
										        <td><?php echo $player['Player']['club']; ?></td>
										        <td><?php echo $player['Player']['category']; ?></td>										   
										        <td><?php echo $player['Player']['canton']; ?></td>
										    </tr>
									    <?php endforeach; ?>
									    <?php unset($player); ?>	                                    
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>

