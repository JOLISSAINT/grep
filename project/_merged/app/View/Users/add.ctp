<!-- app/View/Users/add.ctp -->
<!-- Vue de l'ajout d'un utilisateur-->
<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Ajouter User'); ?></legend>
        <?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('email');
        echo $this->Form->input('password');
		<?php echo $this->Form->hidden('created_by', array('value' => AuthComponent::user('id'))); ?>
		<?php echo $this->Form->hidden('modified_by', array('value' => '0')); ?>
		<?php echo $this->Form->hidden('deleted_by', array('value' => '0')); ?>
        echo $this->Form->input('roles_id', array(
            'options' => array(1 => 'Admin', 2 => 'Gestionnaire')
        ));
		?>
    </fieldset>
<?php echo $this->Form->end(__('Ajouter'));?>
</div>
