<h1>Login</h1>
<?= $this->Form->create() ?>
<?= $this->Form->control('email') ?>
<?= $this->Form->control('password',['name' => 'pass']) ?>
<?= $this->Form->button('Login') ?>
<?= $this->Form->end() ?>