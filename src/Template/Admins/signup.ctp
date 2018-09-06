<h1>Signup</h1>
<?= $this->Form->create($admin); ?>
    <?php
        echo $this->Form->input('name');
        echo $this->Form->input('email');
        echo $this->Form->input('pass');
        echo $this->Form->input('subdomain');
    ?>
<?= $this->Form->button(__('Submit'), ['class' => 'btn-success']) ?>
<?= $this->Form->end() ?>
