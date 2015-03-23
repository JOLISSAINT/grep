<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('plugins/morris');
		echo $this->Html->css('plugins/timeline');
		echo $this->Html->css('font-awesome-4.1.0/css/font-awesome.min');	
		echo $this->Html->css('plugins/dataTables.bootstrap');	
		echo $this->Html->css('sb-admin-2');		
		
		echo $this->Html->script('jquery');		
		echo $this->Html->script('sb-admin-2');		
		echo $this->Html->script('bootstrap.min');				
		echo $this->Html->script('plugins/metisMenu/metisMenu.min');
		echo $this->Html->script('plugins/morris/raphael.min');	
		echo $this->Html->script('plugins/morris/morris.min');	
		echo $this->Html->script('plugins/morris/morris-data');	
		echo $this->Html->script('plugins/dataTables/jquery.dataTables');		
		echo $this->Html->script('plugins/dataTables/dataTables.bootstrap');		

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
	
</head>
<body>
	
    <div id="wrapper">

        <!-- Navigation -->
        <?php echo $this->element('navbar'); ?>


        <div id="page-wrapper">             
                       
            <div class="row">
			<!-- CONTENT -->
				<?php echo $this->Session->flash(); ?>
	        	
				<?php echo $this->fetch('content'); ?>
	        <!-- /CONTENT -->
            </div>
            
	           
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->


    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').dataTable();
    });
    </script>
    
	<?php // echo $this->element('sql_dump'); ?>
</body>
</html>
<?php 
	//DEBUG:
	echo $this->element('sql_dump');
?>