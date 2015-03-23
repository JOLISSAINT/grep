<!-- Fichier : //app/View/Users/login.ctp -->
<!-- Vue de la connexion d'un utilisateur -->
<?php
//$this->requestAction('/users/naviguer');
?>
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <legend>
            <?php echo __('Please enter your email and password'); ?>
        </legend>
        <?php echo $this->Form->input('email');
        echo $this->Form->input('password');
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>