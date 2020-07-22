<h1>Edit Your Profile</h1>
<?= $this->Form->create($admin); ?>
    <?php
        echo $this->Form->input('name', [
            'placeholder' => 'Please enter your display name',
            'title' => 'Please enter your display name',
        ]);

        echo $this->Form->input('pass', [
            'type' => 'password',
            'placeholder' => 'Please enter your password for login.',
            'title' => 'Please enter your password for login.',
            'label' => 'Password',
        ]);
        echo $this->Form->input('phone', [
            'placeholder' => 'Please enter your valid phone number',
            'title' => 'Please enter your valid phone number',
        ]);

    ?>
<?= $this->Form->button(__('Update'), ['class' => 'btn-success']) ?>
<?= $this->Form->end() ?>