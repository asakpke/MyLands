<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password',['name' => 'pass']) ?>
<?php echo $this->Html->link("Forgot Password",['controller'=>'Admins','action'=>'forgotPassword']);?><br><br>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>