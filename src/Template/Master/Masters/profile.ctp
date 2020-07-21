<h1>Edit Your Profile</h1>
<?= $this->Form->create($master); ?>
    <?php
        echo $this->Form->input('pass', [
            'type' => 'password',
            'placeholder' => 'Please enter your password for login.',
            'title' => 'Please enter your password for login.',
            'label' => 'Password',
        ]);

    ?>
<?= $this->Form->button(__('Update'), ['class' => 'btn-success']) ?>
<?= $this->Form->end() ?>